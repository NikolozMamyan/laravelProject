<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Afficher la liste des articles.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::latest()->get();

        return view('articles.index', compact('articles'));
    }

    /**
     * Afficher le formulaire de création d'un article.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Enregistrer un nouvel article.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation des données
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'required|string|max:255',
            'image' => 'nullable|string',
        ]);

        // Création de l'article
        $article = Article::create($validatedData);

        // Redirection avec un message de succès
        return redirect()->route('articles.index')->with('success', 'Article créé avec succès!');
    }
    /**
     * Afficher les détails d'un article.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Afficher le formulaire de modification d'un article.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    // Mettre à jour l'article
    public function update(Request $request, Article $article)
    {
        // Validation des données
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'required|string|max:255',
            'image' => 'nullable|string',
        ]);

        // Mise à jour de l'article
        $article->update($validatedData);

        // Retourner une réponse JSON
     
        return redirect()->route('articles.index')->with('success', 'Article mise à jour avec succès!');
    }

    /**
     * Supprimer un article.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        if ($article->image) {
            Storage::delete($article->image);
        }

        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Article supprimé avec succès.');
    }
}