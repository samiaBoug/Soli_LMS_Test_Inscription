<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tag;
use App\Models\User;
use App\Services\ArticleService;
use App\Services\CommentService;
use App\Services\TagService;
use App\Services\UserService;

class ArticleController extends Controller
{
  protected $articleService , $commentService , $userService, $tagService;
  public function __construct(ArticleService $articleService , CommentService $commentService , UserService $userService, TagService $tagService)
  {
    $this->articleService = $articleService;
    $this->commentService = $commentService ;
    $this->userService = $userService;
    $this->tagService = $tagService;
  }

 
  public function index(Request $request)
  {
    $query = $this->articleService->query();
    
    $ArticleCount= $this->articleService->count();
    $CommentCount = $this->commentService->count();
    $UserCount = $this->userService->count();

    // Filtrer par catégorie
    if ($request->has('category') && $request->category != '') {
      $query->where('category_id', $request->category);
    }

    // Filtrer par tag
    if ($request->has('tag') && $request->tag != '') {
      $query->whereHas('tags', function ($query) use ($request) {
        $query->where('tags.id', $request->tag);
      });
    }

    // Filtrer par recherche dans le titre ou le contenu
    if ($request->has('search') && $request->search != '') {
      $query->where(function ($query) use ($request) {
        $query->where('title', 'like', '%' . $request->search . '%')
          ->orWhere('content', 'like', '%' . $request->search . '%');
      });
    }

    // Paginer les résultats
    $articles = $query->paginate(10);

    // Ajouter les paramètres de filtrage à la pagination
    $articles->appends($request->all());
    $categories = $this->articleService->all();
    $tags = $this->tagService->all();


    if (Auth::check() && Auth::user()->roles->contains('name', 'admin')) {
      return view('admin.article.index', compact('articles', 'categories', 'tags','ArticleCount','CommentCount', 'UserCount' ));
    } else {
      return view('public.index', compact('articles', 'categories', 'tags'));
    }
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    if (!Auth::check() || !Auth::user()->roles->contains('name', 'admin')) {
      return redirect()->route('articles.index');
    }

    $categories = Category::all();
    $allTags = Tag::all();

    return view('admin.article.create', compact('categories', 'allTags'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(ArticleRequest $request)
  {
    if (!Auth::check() || !Auth::user()->roles->contains('name', 'admin')) {
      return redirect()->route('articles.index');
    }


    $article = Article::create([
      'title' => $request['title'],
      'category_id' => $request['category'],
      'content' => $request['content'],
    ]);

    // Attach selected tags
    $article->tags()->attach($request['tags'] ?? []);

    return redirect()->route('articles.index')->with('success', 'L\'article a bien été créé');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    $article = Article::with(['category', 'tags', 'comments'])->findOrFail($id);
    $commentableId = $article->id;
    $commentableType = Article::class;

    if (Auth::check() && Auth::user()->roles->contains('name', 'admin')) {
      return view('admin.article.show', compact('article', 'commentableId', 'commentableType'));
    } else {
      return view('public.show', compact('article', 'commentableId', 'commentableType'));
    }
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit($id)
  {
    if (!Auth::check() || !Auth::user()->roles->contains('name', 'admin')) {
      return redirect()->route('articles.index');
    }

    $article = Article::findOrFail($id);
    $categories = Category::all();
    $allTags = Tag::all();
    $selectedTags = $article->tags->pluck('id')->toArray();

    return view('admin.article.edit', compact('article', 'categories', 'allTags', 'selectedTags'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(ArticleRequest $request, $id)
  {
    if (!Auth::check() || !Auth::user()->roles->contains('name', 'admin')) {
      return redirect()->route('articles.index');
    }



    $article = Article::findOrFail($id);
    $article->update([
      'title' => $request['title'],
      'category_id' => $request['category'],
      'content' => $request['content'],
    ]);

    $article->tags()->sync($request['tags'] ?? []);

    return redirect()->route('articles.index')->with('success', 'L\'article a bien été modifié');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    if (!Auth::check() || !Auth::user()->roles->contains('name', 'admin')) {
      return redirect()->route('articles.index');
    }

    $article = Article::where('id', $id);
    $article->delete();
    return redirect()->route('articles.index')->with('success', 'L\'article a bien été supprimé');
  }
}
