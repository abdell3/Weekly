<!-- @extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Gestion des announcement</h2>

    <a href="{{ route('announcement.create') }}" class="bg-green-500 text-white px-4 py-2 rounded mb-4 inline-block">Ajouter une annonce</a>

    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border p-2">Titre</th>
                <th class="border p-2">Prix</th>
                <th class="border p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($announcements as $announcement)
            <tr class="border">
                <td class="p-2">{{ $announcement->titre }}</td>
                <td class="p-2">{{ $announcement->prix }} €</td>
                <td class="p-2 flex space-x-2">
                    <a href="{{ route('announcements.show', $announcement->id) }}" class="bg-blue-500 text-white px-2 py-1 rounded">Voir</a>
                    <a href="{{ route('announcements.edit', $announcement->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Modifier</a>
                    
                    <form action="{{ route('announcements.destroy', $announcement->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded" onclick="return confirm('Voulez-vous vraiment supprimer cette annonce ?')">
                            Supprimer
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection -->


@extends('layouts.app')

@section('title', 'Liste des Annonces')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Liste des Annonces</h1>

    @foreach ($announcements as $announcement)
        <div class="bg-white p-6 shadow rounded mb-4">
            <h2 class="text-2xl font-bold">{{ $announcement->titre }}</h2>
            <p class="text-gray-700">{{ $announcement->description }}</p>

            <h3 class="mt-4 font-semibold">Commentaires :</h3>
            @if ($announcement->comments->isEmpty())
                <p class="text-gray-500">Aucun commentaire.</p>
            @else
                @foreach ($announcement->comments as $comment)
                    <div class="bg-gray-100 p-3 rounded mt-2">
                        <p class="text-sm text-gray-500">
                            <strong>{{ $comment->user->name }}</strong> - {{ $commentaire->created_at->diffForHumans() }}
                        </p>
                        <p>{{ $comment->contenu }}</p>
                    </div>
                @endforeach
            @endif

            <a href="{{ route('comments.create', $announcement->id) }}" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded">Ajouter un commentaire</a>
        </div>
    @endforeach
@endsection

