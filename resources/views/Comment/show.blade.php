@extends('layouts.app')

@section('title', 'Détail du commentaire')

@section('contents')
    <h2 class="text-2xl font-bold mb-4">Commentaire de {{ $comment->user->name }}</h2>
    <div class="bg-white p-6 rounded shadow">
        <p class="text-gray-600">{{ $comment->created_at->format('d/m/Y H:i') }}</p>
        <p class="mt-4">{{ $comment->contenu }}</p>

        @if (Auth::id() === $comment->user_id)
            <a href="{{ route('comments.edit', $comment->id) }}" class="block mt-4 bg-yellow-500 text-white px-4 py-2 rounded">Modifier</a>
            <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="mt-2">
                @csrf
                @method('DELETE')
                <button class="bg-red-500 text-white px-4 py-2 rounded">Supprimer</button>
            </form>
        @endif
    </div>

    <a href="{{ route('comments.index', $comment->announcement_id) }}" class="mt-4 inline-block text-blue-500">Retour aux commentaires</a>
@endsection
