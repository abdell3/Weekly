@extends('layouts.app')

@section('title', 'Ajouter un commentaire')

@section('contents')
    <h2 class="text-2xl font-bold mb-4">Ajouter un commentaire</h2>

    <form action="{{ route('comments.store', $announcementId) }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf
        <label class="block mb-2">Commentaire :</label>
        <textarea name="contenu" class="w-full p-2 border rounded" required></textarea>

        <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Publier</button>
        <a href="{{ route('commentaires.index', $annonceId) }}" class="ml-2 text-blue-500">Annuler</a>
    </form>
@endsection
