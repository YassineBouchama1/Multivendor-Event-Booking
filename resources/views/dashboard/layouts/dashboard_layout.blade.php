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

            @include('dashboard/layouts.sideBar')
             <!--  inside page  -->
  <div class=" flex-grow min-h-[100%] py-20 relative px-4 lg:pr-8 lg:pl-3 ">


    <!-- Header Start -->
            @include('dashboard/layouts.header')

               <!-- Header StaEndrt -->

                <!--  start page content  -->
                <main class="  top-14 fixed h-screen pt-10   px-4 lg:px-8 lg:pl-3 left-0 lg:left-72 right-0   transition-all duration-300 ease-in-out ">
                    @yield('content')
                </main>

    <!--  end page content  -->


        </div>

    </body>
</html>
