<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Comfy Policy App')</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>

<body class="font-sans antialiased dark:bg-slate-700 dark:text-white/80">
     <nav class="shadow-sm">
        <div class="max-w-full px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex-shrink-0 flex items-center">
                <h1 class="text-2xl font-semibold">Comfy Policy App</h1>
                </div>
                <div class="flex items-center">
                    @auth
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="px-4 py-2">
                                Logout
                            </button>
                        </form>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
    <div class="flex min-h-[calc(100vh-64px)]">
        <aside class="w-64 bg-gray-800">
            <nav>
                <a href="{{ route('dashboard') }}"
                   class="flex items-center px-6 py-3 hover:bg-gray-700 {{ request()->routeIs('dashboard') ? 'bg-gray-700' : '' }}">
                    Dashboard
                </a>
                <a href="{{ route('policies') }}"
                class="flex items-center px-6 py-3 hover:bg-gray-700 {{ request()->routeIs('policies') ? 'bg-gray-700' : '' }}">
                    View Policies
                </a>
            </nav>
        </aside>

        <main class="flex-1 p-8">
            @yield('page')
        </main>
    </div>
</body>

</html>