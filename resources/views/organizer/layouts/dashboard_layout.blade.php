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
    <style>
.section::-webkit-scrollbar {
  width: 10px;
}
.section::-webkit-scrollbar-track {
  /* background-color: black; */
}

    </style>
    <body class=" flex  flex-row w-full  bg-[#F5F6FA]  text-base font-normal leading-5 font-sans">
        {{-- Loading  --}}
        <div id="loading-spinner" class="  fixed  w-full bg-blue-400/15 h-screen z-[999] flex justify-center items-center" >
            <div class="loading-spinner  top-0 left-0 right-0 b-0 "></div>
            </div>
            @include('organizer/layouts.sideBar')
             <!--  inside page  -->
  <div  class=" flex-grow min-h-screen  relative px-4 ">


    <!-- Header Start -->
            @include('organizer/layouts.header')

               <!-- Header StaEndrt -->
               <!--  start page content  -->
               <main id="mainSide" class="  top-14  absolute h-full pt-10   px-4   md:px-8 left-0 lg:left-60 right-0   transition-all duration-300 ease-in-out ">
                    <h2 class="text-3xl font-bold pb-4"> @yield('title')</h2>
                    @yield('content')
                </main>

    <!--  end page content  -->


        </div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        let logoutDashboard = document.getElementById('logoutDashboard')
        let toggleSideBar = document.getElementById('toggleSideBar');
        let sidebar_dash = document.getElementById('sidebar_dash');
        let mainSideHeader = document.getElementById('mainSideHeader');
        let mainSide = document.getElementById('mainSide');

        console.log('main')

        toggleSideBar.addEventListener('click', onToggle);




        function onToggle() {
            if (sidebar_dash.classList.contains('left-0')) {
                sidebar_dash.classList.remove('left-0')

                sidebar_dash.classList.add('left-60')

            } else {
                sidebar_dash.classList.remove('left-60')
                sidebar_dash.classList.add('left-0')


            }
        }




    });


</script>
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
    </body>
</html>
