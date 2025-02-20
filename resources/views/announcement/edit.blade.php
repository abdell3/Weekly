@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Modifier l'announcement</h2>

    <form action="{{ route('announcement.update', $announcement->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="titre" value="{{ $announcement->titre }}" class="border p-2 w-full rounded" required>
        <input type="text" name="slug" value="{{ $announcement->slug }}" class="border p-2 w-full rounded mt-2" required>
        <textarea name="description" class="border p-2 w-full rounded mt-2" required>{{ $announcement->description }}</textarea>
        <input type="number" name="prix" value="{{ $announcement->prix }}" class="border p-2 w-full rounded mt-2" required>
        <select name="status" class="border p-2 w-full rounded mt-2">
            <option value="brouillon" {{ $announcement->status == 'brouillon' ? 'selected' : '' }}>Brouillon</option>
            <option value="actif" {{ $announcement->status == 'actif' ? 'selected' : '' }}>Actif</option>
            <option value="archive" {{ $announcement->status == 'archive' ? 'selected' : '' }}>Archivé</option>
        </select>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-2">Mettre à Jour</button>
    </form>
</div>
@endsection
