@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Ajouter une Annonce</h2>

    <form action="{{ route('annonces.store') }}" method="POST">
        @csrf
        <input type="text" name="titre" placeholder="Titre de l'annonce" class="border p-2 w-full rounded" required>
        <input type="text" name="slug" placeholder="Slug" class="border p-2 w-full rounded mt-2" required>
        <textarea name="description" placeholder="Description" class="border p-2 w-full rounded mt-2" required></textarea>
        <input type="number" name="prix" placeholder="Prix (€)" class="border p-2 w-full rounded mt-2" required>
        <select name="status" class="border p-2 w-full rounded mt-2">
            <option value="brouillon" selected>Brouillon</option>
            <option value="actif">Actif</option>
            <option value="archive">Archivé</option>
        </select>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-2">Ajouter</button>
    </form>
</div>
@endsection
