@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Liste des articles</h1>
        <a href="{{ route('articles.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">
            Créer un nouvel article
        </a>
    </div>

    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @forelse($articles as $article)
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-2">{{ $article->title }}</h2>
            <p class="text-gray-700 mb-4">{{ Str::limit($article->content, 100) }}</p>
            <p class="text-gray-500 mb-4">Catégorie : {{ $article->category }}</p>
            <div class="flex justify-between items-center">
                <a href="{{ route('articles.show', $article->id) }}" class="text-blue-500 hover:underline">Voir les détails</a>
                <a href="{{ route('articles.edit', $article->id) }}" class="text-blue-500 hover:underline">Modifier</a>
                <form action="{{ route('articles.destroy', $article->id) }}" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article?')">Supprimer</button>
                </form>
            </div>
        </div>
        @empty
        <div class="col-span-1 sm:col-span-2 lg:col-span-3 text-center">
            <p class="text-gray-500">Aucun article trouvé.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
