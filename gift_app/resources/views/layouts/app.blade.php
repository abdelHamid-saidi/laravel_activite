<!DOCTYPE html>
<html>
<head>
    <title>Gifts App</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gray-100">

<nav class="bg-white shadow p-4 flex gap-4">
    <a href="{{ route('index') }}" class="text-blue-600">Accueil</a>
    <a href="{{ route('gifts.create') }}" class="text-green-600">Ajouter</a>
</nav>

<div class="max-w-4xl mx-auto mt-6">
    @yield('content')
</div>

</body>
</html>