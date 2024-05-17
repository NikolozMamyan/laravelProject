@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-2xl font-bold mb-4">Liste des articles</h1>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <ul>
            @forelse($articles as $article)
                <li class="mb-4">
                    <h2 class="text-xl font-bold">{{ $article->title }}</h2>
                    <p>{{ $article->content }}</p>
                    <p>Catégorie : {{ $article->category }}</p>
                    <a href="{{ route('articles.show', $article->id) }}" class="text-blue-500 hover:underline">Voir les détails</a>
                </li>
            @empty
                <p>Aucun article trouvé.</p>
            @endforelse
        </ul>
    </div>
@endsection