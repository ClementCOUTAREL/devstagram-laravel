<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    @stack('styles')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/dropzone.js"></script>
    @yield('styles')
    @vite('resources/css/app.css')

</head>

<body class="bg-gray-100">
    <header class="bg-white border-b flex flex-row justify-between items-center p-3">
        <h1 class="text-3xl font-extrabold">Devstagram</h1>
        <nav>
            @auth
                <div class="flex flex-row ">
                    <a href="{{ route('home', auth()->user()->name) }}" class="text-xl font-extrabold mr-3">Home</a>
                    <a href="{{ route('profile') }}" class="text-xl font-extrabold mr-3">My profile</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-xl font-extrabold mr-3">Logout</button>
                    </form>
                </div>
            @else
                <a href="{{ route('login') }}" class="text-xl font-extrabold mr-3">Login</a>
                <a href="{{ route('register') }}" class="text-xl font-extrabold mr-3">Register</a>
            @endauth
        </nav>
    </header>
    <main class="min-h-screen">
        <div class="p-16">
            @yield('content')
        </div>
    </main>
    <footer class="bg-white border-b p-3 text-center font-bold text-xl">
        <h5>Created by Clement COUTAREL with Laravel and TailwindCSS</h5>
    </footer>
    @yield('scripts')
</body>

</html>
