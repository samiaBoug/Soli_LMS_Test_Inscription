<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

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
            'message' => 'Succès'
        ], 200);
    }

    /**
     * Ajouter un nouvel article.
     */
    public function store(Request $request)
    {
       

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required|string',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id',
        ]);

        $article = Article::create($validated);
        $article->tags()->attach($validated['tags'] ?? []);

        return response()->json([
            'message' => "L'article a bien été créé",
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
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
       
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required|string',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id',
        ]);

        $article->update($validated);
        $article->tags()->sync($validated['tags'] ?? []);

        return response()->json([
            'message' => "L'article a bien été modifié",
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
            'message' => "L'article a bien été supprimé"
        ], 200);
    }
}
