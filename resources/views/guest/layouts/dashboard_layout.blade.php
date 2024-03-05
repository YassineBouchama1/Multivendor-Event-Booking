<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css" />
        <script src="https://kit.fontawesome.com/ea3542be0c.js" crossorigin="anonymous"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>


    <body class="relative flex  flex-col w-full  h-full bg-backgroundHome  text-base font-normal leading-5 font-sans">
<div id="loading-spinner" class="loading-spinner absolute top-0 left-0 right-0 b-0" style="display: none;"></div>

    <!-- Header Start -->

    @include('guest/components.header')
            @yield('content')

            <script>
// Show spinner on page load
document.addEventListener("DOMContentLoaded", function() {
    document.getElementById('loading-spinner').style.display = 'block';
});

// Hide spinner when page has finished loading
window.onload = function() {
    document.getElementById('loading-spinner').style.display = 'none';
};

// Show spinner when navigating to a new page
document.addEventListener("click", function(event) {
    if (event.target.tagName === 'A') {
        document.getElementById('loading-spinner').style.display = 'block';
    }
});

            </script>
    </body>
</html>
