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


        {{-- Loading  --}}
<div id="loading-spinner" class="  fixed  w-full bg-green-400/15 h-screen z-[999] flex justify-center items-center" >
<div class="loading-spinner  top-0 left-0 right-0 b-0 "></div>
</div>

    <!-- Header Start -->

    @include('guest/components.header')
            @yield('content')

            <script>
                // Show spinner on page load
                document.addEventListener("DOMContentLoaded", function() {
                    document.getElementById('loading-spinner').classList.add('flex');
                });

                // Hide spinner when page has finished loading
                window.onload = function() {
                    document.getElementById('loading-spinner').classList.add('hidden');
                };

                // Show spinner when navigating to a new page
                document.addEventListener("click", function(event) {
                    if (event.target.tagName === 'A') {
                        document.getElementById('loading-spinner').classList.remove('hidden');
                    }
                });
                </script>



{{-- notifecation --}}
<div id="notification-container" class="fixed bottom-3 left-2">




</div>

    </body>


    {{-- @vite('resources/js/app.js'); --}}



    <script>
        setTimeout(() => {
            console.log('Listening to socket events');
            window.Echo.channel('channel-reservation')
                .listen('.App\\Events\\ReservationsRealTime', (e) => {
                    console.log(e);

                    //1- xreate card container
                    let cardContainer = document.createElement('div');
                    cardContainer.className = 'card flex items-center p-4 bg-white rounded-lg shadow-xl mx-auto max-w-sm m-10';

                    //2- add new card HTML
                    cardContainer.innerHTML = `
                        <div class="flex flex-col">
                            <span class="text-xs font-bold uppercase px-2 mt-2 mr-2 text-green-900 bg-green-400 border rounded-full">New</span>
                            <span class="text-xs font-semibold uppercase m-1 py-1 mr-3 text-gray-500">Now</span>
                        </div>
                        <img class="h-12 w-12 rounded-full" alt="${e.name}'s avatar" src="http://localhost/avatars/${e.avatar}" />
                        <div class="ml-5">
                            <h4 class="text-lg font-semibold leading-tight text-gray-900">${e.name}</h4>
                            <p class="text-sm text-gray-600">${e.message}</p>
                            <button class="remove-btn">Remove</button>
                        </div>
                    `;

                    //- qdd event listener to remove button
                    let removeButton = cardContainer.querySelector('.remove-btn');
                    removeButton.addEventListener('click', function () {
                        cardContainer.remove();
                    });

                    //4- append card to notification container
                    let notificationContainer = document.getElementById('notification-container');
                    notificationContainer.appendChild(cardContainer);
                });
        }, 200);
    </script>

</html>
