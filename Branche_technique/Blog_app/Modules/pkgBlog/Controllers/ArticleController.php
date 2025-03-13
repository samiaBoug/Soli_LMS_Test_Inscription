<?php

namespace Modules\pkgBlog\Controllers;

use App\Http\Controllers\Controller;
use Modules\pkgBlog\App\Requests\ArticleRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Modules\pkgBlog\App\Exports\ArticleExport;
use Modules\pkgBlog\App\Imports\ArticleImport;
use Modules\pkgBlog\Services\ArticleService;
use Modules\pkgBlog\Services\CategoryService;
use Modules\pkgBlog\Services\CommentService;
use Modules\pkgBlog\Services\UserService;
use Modules\pkgBlog\Services\TagService;

class ArticleController extends Controller
{
  protected $articleService , $commentService , $userService, $tagService , $categoryService;

  public function __construct(ArticleService $articleService , CommentService $commentService , UserService $userService, TagService $tagService , CategoryService $categoryService)
  {
    $this->articleService = $articleService;
    $this->commentService = $commentService ;
    $this->userService = $userService;
    $this->tagService = $tagService;
    $this->categoryService= $categoryService ;
  }

 
  public function index(Request $request)
  {
    
    // Paginer les résultats
    $articles =  $this->articleService->filterArticles($request);

    // Ajouter les paramètres de filtrage à la pagination
    $articles->appends($request->all());
    $categories = $this->categoryService->all();
    $tags = $this->tagService->all();


    if (Auth::check() && Auth::user()->roles->contains('name', 'admin')) {
      return view('pkgBlog::article.index', compact('articles', 'categories', 'tags' ));
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

    $categories = $this->categoryService->all();
    $allTags = $this->tagService->all();

    return view('pkgBlog::article.create', compact('categories', 'allTags'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(ArticleRequest $request)
  {
    if (!Auth::check() || !Auth::user()->roles->contains('name', 'admin')) {
      return redirect()->route('articles.index');
    }


   $this->articleService->create($request);

    return redirect()->route('articles.index')->with('success', 'L\'article a bien été créé');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    $article =$this->articleService->getArticle($id);
    $commentableId = $article->id;
    $commentableType = get_class($article);

    if (Auth::check() && Auth::user()->roles->contains('name', 'admin')) {
      return view('pkgBlog::article.show', compact('article', 'commentableId', 'commentableType'));
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

    $article = $this->articleService->find($id);
    $this->authorize('edit', $article);

    $categories = $this->categoryService->all();
    $allTags = $this->tagService->all();
    $selectedTags = $article->tags->pluck('id')->toArray();

    return view('pkgBlog::article.edit', compact('article', 'categories', 'allTags', 'selectedTags'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(ArticleRequest $request, $id)
  {
    if (!Auth::check() || !Auth::user()->roles->contains('name', 'admin')) {
      return redirect()->route('articles.index');
    }

    $article = $this->articleService->find($id);
    $this->authorize('edit', $article);

    $this->articleService->update($request , $id);

    

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

    $article = $this->articleService->find($id);
    $this->authorize('kill', $article);

    $article->delete();
    return redirect()->route('articles.index')->with('success', 'L\'article a bien été supprimé');
  }
  public function import(){
 
    Excel::import(new ArticleImport, 'articles.xlsx');
    return redirect('/articles')->with('success', 'All good!');
  }
  public function export()
  {
      return Excel::download(new ArticleExport, 'articles.xlsx');
  }
}
