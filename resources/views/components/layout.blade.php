<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    {{-- CSS --}}
    @vite(["resources/css/style.css"])
</head>
<body>
    <nav class="navbar bg-dark border-bottom border-body">
        <x-navlink href="/" :active="request()->is('home')">Home</x-navlink>
        <x-navlink href="{{ route('articles.index') }}" :active="request()->is('articles.index')">Articles</x-navlink>
        <x-navlink href="{{ route('articles.create') }}" :active="request()->is('articles.index')">Post</x-navlink>
        <x-navlink href="/dashboard" :active="request()->is('dashboard')">Dashboard</x-navlink>
        <x-navlink href="/login" :active="request()->is('log in')">Log In</x-navlink>
    </nav>
    <main>
        {{ $slot }}
    </main>
    <footer>
        <x-navlink href="/logout">Log Out</x-navlink>
    </footer>
</body>
</html>
