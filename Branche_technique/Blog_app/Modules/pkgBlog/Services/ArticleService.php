<?php
namespace Modules\pkgBlog\Services ;

use Modules\pkgBlog\App\Requests\ArticleRequest;
use Modules\pkgBlog\Models\Category;
use Illuminate\Support\Facades\Auth;
use Modules\pkgBlog\Models\Article ;

class ArticleService{

    //méthode getArticlesWithRelations()
    public function getArticlesWithRelations(){
        return Article::with(['user', 'comments', 'category'])->get();
    }
    // query
    public function query(){
        return Article::query() ;
    }
    //count 
    public function count(){
        return Article::count();
    }
    //all
    public function all(){
        return Article::all();
    }
    //find
    public function find($id){
        return Article::findOrFail($id);
    }
    //create 
    public function create(ArticleRequest $request){
        $article = Article::create([
            'title' => $request['title'],
            'category_id' => $request['category'],
            'content' => $request['content'],
            'user_id'=> Auth::user()->id 
          ]);
      
          // Attach selected tags
        $article->tags()->sync($request['tags'] ?? []);
        return $article;
    }
    //update 
    public function update($request ,  $id){
        $article = $this->find($id);
        $article->update([
            'title' => $request['title'],
            'category_id' => $request['category'],
            'content' => $request['content'],
          ]);
          $article->tags()->sync($request['tags'] ?? []);
          return $article;

    }
    
    //updateArticleCategories
    public function updateArticleCategories(Article $article, array $categoryIds){
        
        $article->categories()->sync($categoryIds);
    }

    //delete

    public function delete($id){
    // Trouver l'article par son ID
        $article = Article::findOrFail($id);
        $article->comments()->delete();
        $article->categories()->detach();
        $article->delete();
    }

    // get categories
    public function allCategories(){
        return Category::all();
    }

    public function getArticle($id){
        // Récupérer l'article avec l'ID donné, y compris les relations
       return Article::with(['user', 'comments', 'category'])->findOrFail($id);

    }
    //filtre 
    public function filterArticles(ArticleRequest $request)
    {
        $query = Article::query();
    
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }
    
        if ($request->filled('tag')) {
            $query->whereHas('tags', function ($query) use ($request) {
                $query->where('tags.id', $request->tag);
            });
        }
    
        if ($request->filled('search')) {
            $query->where(function ($query) use ($request) {
                $query->where('title', 'like', '%' . $request->search . '%')
                      ->orWhere('content', 'like', '%' . $request->search . '%');
            });
        }
    
        return $query->paginate(10);
    }
    
}