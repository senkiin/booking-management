<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        // Detectar preferencia de modo oscuro del navegador
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-100 min-h-screen flex items-center justify-center">
    <div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
        <!-- Header -->
        <div class="bg-indigo-600 dark:bg-indigo-700 p-8 text-center">
            <h1 class="text-4xl font-bold text-white">Welcome to Booking Management</h1>
            <p class="text-indigo-200 dark:text-indigo-300 mt-2">
                Simplify your reservation management with style.
            </p>
        </div>

        <!-- Content -->
        <div class="p-8 text-center">
            <p class="text-lg">
                Log in to access your account or create a new one to get started.
            </p>
            <div class="mt-6 flex justify-center gap-6">
                <a href="{{ route('login') }}"
                   class="px-6 py-3 text-white bg-blue-500 hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-700 rounded-lg shadow">
                    Login
                </a>
                <a href="{{ route('register') }}"
                   class="px-6 py-3 text-white bg-green-500 hover:bg-green-600 dark:bg-green-600 dark:hover:bg-green-700 rounded-lg shadow">
                    Register
                </a>
            </div>
        </div>

        <!-- Toggle Dark Mode -->
        <div class="text-center mt-4">
            <button id="toggle-theme"
                    class="px-4 py-2 bg-gray-300 dark:bg-gray-700 text-gray-700 dark:text-gray-200 rounded shadow">
                Toggle Dark Mode
            </button>
        </div>

        <!-- Footer -->
        <div class="bg-gray-100 dark:bg-gray-800 p-4 text-center">
            <p class="text-sm text-gray-500 dark:text-gray-400">
                © 2024 Booking Management. All rights reserved.
            </p>
        </div>
    </div>

    <script>
        // Alternar entre modo claro y oscuro
        const toggleThemeButton = document.getElementById('toggle-theme');
        toggleThemeButton.addEventListener('click', () => {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.theme = 'light';
            } else {
                document.documentElement.classList.add('dark');
                localStorage.theme = 'dark';
            }
        });
    </script>
</body>
</html>
