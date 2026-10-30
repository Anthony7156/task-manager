<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-50 text-gray-800 antialiased">
    <div class="min-h-screen">
        <header class="border-b border-gray-200 bg-white">
            <div class="mx-auto flex max-w-4xl items-center justify-between px-4 py-4">
                <a href="/tasks" class="text-xl font-semibold text-indigo-600">
                    Task Manager
                </a>
                <a href="/tasks/create"
                   class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm transition hover:bg-indigo-700">
                    + Новая задача
                </a>
            </div>
        </header>

        <main class="mx-auto max-w-4xl px-4 py-8">
            @if (session('success'))
                <div class="mb-6 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
                    {{ session('success') }}
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</body>
</html>