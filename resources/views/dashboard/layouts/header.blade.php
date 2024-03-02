<header class="bg-white [&.show]:translate-y-0 top-0 fixed h-16 px-4 md:px-8 lg:pl-3 left-0 lg:left-60 right-0 flex items-center justify-between gap-3  transition-all duration-300 ease-in-out  ">


    {{-- <button id="toggleSideBar" class="text-white"><i class="lg:hidden  flex ti ti-menu-2 text-xl cursor-pointer  "> </i></button> --}}



    <div class="  w-full  flex  gap-x-4">
<button>click</button>
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



<div class="flex flex-row items-center gap-3 ml-auto md:ml-12"> icons
    <div class="w-8 h-8 rounded-full bg-[black]"></div>
    <div class="w-8 h-8 rounded-full bg-[black]"></div>
    <div class="w-8 h-8 rounded-full bg-[black]"></div>
    <div class="w-8 h-8 rounded-full bg-[black]"></div>
    <div class="w-8 h-8 rounded-full bg-[black]"></div>
    <div class="w-8 h-8 rounded-full bg-[black]"></div>
</div>
</header>


<script>
    const IMG_URL = 'http://localhost/blog/backend/';
    document.addEventListener('DOMContentLoaded', function() {
        let logoutDashboard = document.getElementById('logoutDashboard')
        let toggleSideBar = document.getElementById('toggleSideBar');
        let sidebar_dash = document.getElementById('sidebar_dash');
        // header dahsboard info admin
        let ProfileImg = document.getElementById('ProfileImg')
        let username_admin = document.getElementById('username_admin')

        toggleSideBar.addEventListener('click', onToggle);


        ProfileImg.src = `${IMG_URL}${localStorage.getItem('image_admin')}`
        username_admin.textContent = localStorage.getItem('username_admin')

        function onToggle() {
            if (sidebar_dash.classList.contains('left-[-100%]')) {
                sidebar_dash.classList.remove('left-[-100%]');
                sidebar_dash.classList.add('left-5');
            } else {
                sidebar_dash.classList.remove('left-5');
                sidebar_dash.classList.add('left-[-100%]');
            }
        }



        logoutDashboard.addEventListener('click', function() {
            console.log('clicklogout')
            localStorage.clear()

            window.location.reload()
        })


    });
</script>
