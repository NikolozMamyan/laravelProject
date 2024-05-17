@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-2xl font-bold mb-4">{{ $article->title }}</h1>
        <p>{{ $article->content }}</p>
        <p>Catégorie : {{ $article->category }}</p>

        @if($article->image)
            <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="max-w-full h-auto mt-4">
        @endif
    </div>
@endsection