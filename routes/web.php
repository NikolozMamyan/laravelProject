<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::get('/', function () {
    return view('welcome');
});


// Liste des articles
Route::get('/articles', [ArticleController::class, 'index']);

// Afficher un article
Route::get('/articles/{id}', [ArticleController::class, 'show']);
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');

// Formulaire de création d'un article
Route::get('/articles/create', [ArticleController::class, 'create']);

// Enregistrer un nouvel article
Route::post('/articles', [ArticleController::class, 'store']);

// Formulaire de modification d'un article
Route::get('/articles/{id}/edit', [ArticleController::class, 'edit']);

// Mettre à jour un article existant
Route::put('/articles/{id}', [ArticleController::class, 'update']);

// Supprimer un article
Route::delete('/articles/{id}', [ArticleController::class, 'destroy']);
