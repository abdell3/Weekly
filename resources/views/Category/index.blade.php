@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Gestion des Catégories</h2>

    
    <form action="{{ route('category.store') }}" method="POST" class="mb-6">
        @csrf
        <div class="grid grid-cols-2 gap-4">
            <input type="text" name="nom" placeholder="Nom de la catégorie" class="border p-2 w-full rounded" required>
            <input type="text" name="slug" placeholder="Slug (ex: techno)" class="border p-2 w-full rounded" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-2">Ajouter</button>
    </form>

    
    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border p-2">Nom</th>
                <th class="border p-2">Slug</th>
                <th class="border p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($category as $categorie)
            <tr class="border">
                <td class="p-2">{{ $categorie->nom }}</td>
                <td class="p-2">{{ $categorie->slug }}</td>
                <td class="p-2 flex space-x-2">
                    
                    <a href="{{ route('categories.edit', $categorie->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Modifier</a>
                    
                    
                    <form action="{{ route('categories.destroy', $categorie->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded" onclick="return confirm('Voulez-vous vraiment supprimer cette catégorie ?')">
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
