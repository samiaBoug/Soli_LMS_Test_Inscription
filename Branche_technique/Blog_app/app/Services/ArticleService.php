<?php
namespace App\Services ;

use App\Models\Article;
use App\Models\Category;

class ArticleService{

    //méthode getArticlesWithRelations()
    public function getArticlesWithRelations(){
        return Article::with(['user', 'comments', 'categories'])->get();
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
       return Article::with(['user', 'comments', 'categories'])->findOrFail($id);

    }
}