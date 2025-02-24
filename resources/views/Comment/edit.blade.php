@extends('layouts.app')

@section('title', 'Modifier un commentaire')

@section('contents')
    <h2 class="text-2xl font-bold mb-4">Modifier votre commentaire</h2>

    <form action="{{ route('comments.update', $comment->id) }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')

        <label class="block mb-2">Contenu :</label>
        <textarea name="contenu" class="w-full p-2 border rounded" required>{{ $comment->contenu }}</textarea>

        <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Modifier</button>
        <a href="{{ route('comments.index', $comment->announcement_id) }}" class="ml-2 text-blue-500">Annuler</a>
    </form>
@endsection
