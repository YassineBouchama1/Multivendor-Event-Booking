<header id="mainSideHeader" class="z-50 bg-white [&.show]:translate-y-0 top-0 fixed h-16 px-4 md:px-8 lg:pl-3 left-0 lg:left-60 right-0 flex items-center justify-between gap-3  transition-all duration-300 ease-in-out  ">


    {{-- <button id="toggleSideBar" class="text-white"><i class="lg:hidden  flex ti ti-menu-2 text-xl cursor-pointer  "> </i></button> --}}



    <div class="  w-full  flex  gap-x-4 items-center">
<button id="toggleSideBar" class="flex flex-col justify-center items-center gap-[0.5px] h-full ">
    <svg width="24px" height="auto" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M4 18L20 18" stroke="#000000" stroke-width="2" stroke-linecap="round"/>
        <path d="M4 12L20 12" stroke="#000000" stroke-width="2" stroke-linecap="round"/>
        <path d="M4 6L20 6" stroke="#000000" stroke-width="2" stroke-linecap="round"/>
        </svg>
</button>
            <div class=" flex items-center  w-2/4 h-12 rounded-full border-2 bg-[#F5F6FA] overflow-hidden text-[#D5D5D5]">
                <div class="grid place-items-center h-full w-12 text-gray-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>

                <input
                class="border-transparent focus:border-transparent focus:ring-0 bg-[#F5F6FA] w-full h-full"
                type="text"
                id="search"
                placeholder="Search" />
            </div>


    </div>



<div class="flex flex-row items-center gap-3 ml-auto md:ml-12">




            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
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

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
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
</div>
</header>


