<header>
    <nav class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
            <a href="{{route('home.index')}}" class="flex items-center">
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Super Event</span>
            </a>
            <div class="flex items-center lg:order-2">
{{-- check if user authed --}}
@guest
<a href="{{route('login')}}" class="text-mainColorhome bg-transparent hover:bg-mainColorhome hover:text-white focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:bg-mainColorhome outline-mainColorhome border-mainColorhome border-2 ">Login</a>
<a href="{{route('register')}}" class="text-white bg-mainColorhome hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:bg-mainColorhome focus:outline-none ">Register</a>
@endguest


                @hasrole('admin')
                <a href="{{url('/admin')}}"  class="text-white bg-mainColorhome hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:bg-mainColorhome focus:outline-none ">Dashboard</a>
            @endhasrole


            @hasrole('user')

            <!-- Settings Dropdown -->
            <div class="flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
<div>
                    <x-slot name="content"  class="text-white bg-mainColorhome hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:bg-mainColorhome focus:outline-none">
                        <x-dropdown-link :href="url('/user')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
            {{-- <a href="{{url('/user')}}"  class="text-white bg-mainColorhome hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:bg-mainColorhome focus:outline-none ">Profile</a> --}}
        @endhasrole


        @hasrole('organizer')
        <a href="{{url('/organizer')}}"  class="text-white bg-mainColorhome hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:bg-mainColorhome focus:outline-none ">Profile</a>
    @endhasrole


            </div>
            <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                    {{-- <li>
                        <a href="#" class="block py-2 pr-4 pl-3 text-white rounded bg-green-700 lg:bg-transparent lg:text-green-700 lg:p-0 dark:text-white" aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-green-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Events</a>
                    </li> --}}


                </ul>
            </div>
        </div>
    </nav>
</header>


</div>
