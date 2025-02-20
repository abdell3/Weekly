@extends('layouts.layout')

@section('title', 'Détails de l\'annonce')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold">{{ $annonce->titre }}</h1>
    <p class="text-gray-600">{{ $annonce->description }}</p>
    <p class="mt-2"><strong>Prix :</strong> {{ number_format($annonce->prix, 2) }} €</p>
    <p class="mt-2">
        <strong>Statut :</strong> 
        @if ($annonce->status === 'actif')
            <span class="text-green-500 font-bold">✅ Actif</span>
        @elseif ($annonce->status === 'brouillon')
            <span class="text-yellow-500 font-bold">📝 Brouillon</span>
        @else
            <span class="text-gray-500 font-bold">📦 Archivé</span>
        @endif
    </p>

    <div class="mt-4">
        <a href="{{ route('annonces.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Retour</a>
        <a href="{{ route('annonces.edit', $annonce->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Modifier</a>
        <form action="{{ route('annonces.destroy', $annonce->id) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Supprimer</button>
        </form>
    </div>
</div>
@endsection
