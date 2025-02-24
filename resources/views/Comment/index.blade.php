@extends('layouts.app')

@section('title', 'Comments')

@section('contents')
    <h2 class="text-2xl font-bold mb-4">Commentaires pour : {{ $announcement->titre }}</h2>

    @foreach ($announcement->comments as $comment)
        <div class="mt-2 p-4 bg-white shadow rounded">
            <p class="text-sm"><strong>{{ $comment->user->name }}</strong> - {{ $comment->created_at->diffForHumans() }}</p>
            <p>{{ $comment->contenu }}</p>

            @if (Auth::id() === $comment->user_id)
                <a href="{{ route('comments.edit', $comment) }}" class="text-blue-500 text-sm">Modifier</a>
                <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-500 text-sm">Supprimer</button>
                </form>
            @endif
        </div>
    @endforeach

    <a href="{{ route('comments.create', $announcement->id) }}" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Ajouter un commentaire</a>
@endsection
