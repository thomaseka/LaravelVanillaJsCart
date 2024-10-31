<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

</head>

<body>
    <div class="flex min-h-screen flex-col">
        @include('layout.navbar')
        <main id="app" class="flex grow items-center w-full mt-14">
            @yield('content')
        </main>
        @include('layout.footer')
    </div>
    <!-- Floating button -->
    <div class="fixed bottom-0 right-0 md:right-5 p-4">
        <button class="bg-blue-600 hover:bg-gray-600 text-white rounded-full w-7 h-7 md:w-10 md:h-10 flex items-center justify-center" id="toTopButton">
            <svg class="w-3 h-3 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
            </svg>
        </button>
    </div>
    <script>
        document.getElementById('toTopButton').addEventListener('click', function(event) {
            event.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>
</body>

</html>