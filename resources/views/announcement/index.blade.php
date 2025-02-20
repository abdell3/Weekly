@extends('layouts.app')

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
            @foreach ($announcement as $annonce)
            <tr class="border">
                <td class="p-2">{{ $annonce->titre }}</td>
                <td class="p-2">{{ $annonce->prix }} €</td>
                <td class="p-2 flex space-x-2">
                    <a href="{{ route('announcement.show', $annonce->id) }}" class="bg-blue-500 text-white px-2 py-1 rounded">Voir</a>
                    <a href="{{ route('announcement.edit', $annonce->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Modifier</a>
                    
                    <form action="{{ route('announcement.destroy', $annonce->id) }}" method="POST">
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
@endsection
