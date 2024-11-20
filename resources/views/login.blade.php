<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased dark:bg-slate-700 dark:text-white/50">
    <div class="min-h-screen flex items-center justify-center ">
        <div class="max-w-md w-full space-y-8 p-8 bg-slate-200 rounded-lg shadow">
            <div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                    Login
                </h2>
            </div>
            <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
                @csrf

                <div class="rounded-md shadow-sm -space-y-px">
                    <div>
                        <label for="email" class="sr-only">Email</label>
                        <input id="email" name="email" type="email" required
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300
                        placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-slate-500
                        focus:border-slate-500 focus:z-10 sm:text-sm"
                            placeholder="Email">
                    </div>
                    <div>
                        <label for="password" class="sr-only">Password</label>
                        <input id="password" name="password" type="password" required
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300
                        placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-slate-500
                        focus:border-slate-500 focus:z-10 sm:text-sm"
                            placeholder="Password">
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm
                    font-medium rounded-md text-white bg-slate-600 hover:bg-blue-700 focus:outline-none
                    focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Sign in
                    </button>
                </div>

                <div class="text-sm text-center">
                    <a href="{{ route('register') }}" class="font-medium text-slate-600 hover:text-blue-500">
                        Don't have an account? Register here
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
