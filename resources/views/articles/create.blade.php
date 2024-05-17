@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-2xl font-bold mb-4">Créer un nouvel article</h1>

        <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="title" class="block font-bold mb-2">Titre</label>
                <input type="text" name="title" id="title" class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label for="content" class="block font-bold mb-2">Contenu</label>
                <textarea name="content" id="content" rows="5" class="w-full border border-gray-300 rounded px-3 py-2" required></textarea>
            </div>

            <div class="mb-4">
                <label for="category" class="block font-bold mb-2">Catégorie</label>
                <input type="text" name="category" id="category" class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label for="image" class="block font-bold mb-2">Image d'illustration</label>
                <input type="file" name="image" id="image" class="w-full border border-gray-300 rounded px-3 py-2">
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Créer</button>
        </form>
    </div>
@endsection