<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestion des Annonces')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-600 p-4 text-white">
        <div class="container mx-auto flex justify-between">
            <a href="{{ route('annonces.index') }}" class="font-bold">🏠 Accueil</a>
            <div>
                <a href="{{ route('annonces.create') }}" class="px-3">➕ Ajouter</a>
                <a href="{{ route('annonces.index', ['status' => 'actif']) }}" class="px-3">✅ Actifs</a>
                <a href="{{ route('annonces.index', ['status' => 'brouillon']) }}" class="px-3">📝 Brouillons</a>
                <a href="{{ route('annonces.index', ['status' => 'archive']) }}" class="px-3">📦 Archivés</a>
            </div>
        </div>
    </nav>

    <div class="container mx-auto mt-8">
        @yield('content')
    </div>
</body>
</html>
