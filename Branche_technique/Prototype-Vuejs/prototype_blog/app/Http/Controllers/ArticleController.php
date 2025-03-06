<?php
namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class ArticleController extends Controller
{
    /**
     * Récupérer tous les articles.
     */
    public function index()
    {
        $articles = Article::with(['category', 'tags'])->get();
        return response()->json([
            'data' => $articles,

        ], 200);
    }

    /**
     * Ajouter un nouvel article.
     */
    public function store(ArticleRequest $request)
    {
        

        $article = Article::create($request);
        $article->tags()->attach($request['tags'] ?? []);

        return response()->json([
            'message' => __('articles.article_created'),
            'article' => $article
        ], 201);
    }

    /**
     * Récupérer un article par son ID.
     */
    public function show($id)
    {
        $article = Article::with(['category', 'tags'])->findOrFail($id);
        return response()->json([
            'data' => $article
        ], 200);
    }

    /**
     * Mettre à jour un article.
     */
    public function update(ArticleRequest $request, $id)
    {
        $article = Article::findOrFail($id);

        

        $article->update($request);
        $article->tags()->sync($request['tags'] ?? []);

        return response()->json([
            'message' => __('articles.article_updated'),
            'article' => $article
        ], 200);
    }

    /**
     * Supprimer un article.
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return response()->json([
            'message' => __('articles.article_deleted')
        ], 200);
    }
}
