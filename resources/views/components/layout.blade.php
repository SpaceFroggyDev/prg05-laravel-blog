<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>C&C | {{ $title }}</title>
    {{-- CSS --}}
    @vite(["resources/css/style.css"])
</head>
<body>
    <nav class="navbar bg-dark border-bottom border-body">
        <x-navlink href="/" :active="request()->is('home')"><img src="/images/logosmall.png"></x-navlink>
        <x-navlink href="{{ route('articles.index') }}" :active="request()->is('articles.index')">Articles</x-navlink>
        @auth()
            @if(Auth::user()->is_admin)
                <x-nav-link href="{{route('admin.index')}}">Admin Dashboard</x-nav-link>
            @endif
            <x-navlink href="{{ route('articles.create') }}" :active="request()->is('articles.index')">Write article</x-navlink>
            <x-navlink href="{{ route('dashboard') }}" :active="request()->is('dashboard')">{{  Auth::user()->name }}</x-navlink>
        @endauth
        @guest
            <x-navlink href="{{ route('login') }}">Log In</x-navlink>
            <x-nav-link href="{{ route('register') }}">Register</x-nav-link>
        @endguest
    </nav>
    <main>
        {{ $slot }}
    </main>
    <footer>
        <img src="/images/logo.png">
        <p>Made by Alex Dusselaar - 2024</p>
    </footer>
</body>
</html>
