<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::get('/', function () {
    return view('welcome');
});

// Formulaire de création d'un article
Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');

// Liste des articles
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');

// Afficher un article
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');

// Enregistrer un nouvel article
Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');

// Formulaire de modification d'un article
Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');

// Mettre à jour un article existant
Route::put('/articles/{article}', [ArticleController::class, 'update'])->name('articles.update');

// Supprimer un article
Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');