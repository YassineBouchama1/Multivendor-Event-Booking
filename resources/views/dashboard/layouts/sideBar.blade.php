

<aside id="sidebar_dash" class="section w-60 bg-white transition-all duration-300 ease-in-out fixed z-40 max-lg:-translate-x-full max-lg:bg-surface-500 dark:max-lg:bg-surfacedark-500 left-0 top-0 bottom-0 h-screen  overflow-auto  ">
    <div class="h-[100px] p-5 flex justify-between ">
      <a class="text-center w-full " href="/admin/">

        <h1 class="text-2xl font-medium tracking-wide text-gray-900 dark:text-gray-100 compact-hide ml-2">LOGO</h1>
      </a>
      <button id="toggleSideBarinside"><i class="lg:hidden  flex ti ti-x text-xl cursor-pointer  "> </i></button>

    </div>

    <!-- body sidebar -->
    <ul class="h-full  flex  flex-col   overflow-y-auto pr-5 w-full text-white">

      <li id="mainlink" class=" mt-1 cursor-pointer 	bg-[#4880FF]  duration-300   no-underline   whitespace-nowrap   text-lg p-2 sm:p-3 sm:pl-6 rounded-tr-md rounded-br-md font-normal leading-6">
        <a href="./" class="">
          <i class="ti ti-home h-[24px] w-[24px]  "></i>
          <span>Dashboard</span>

        </a>
      </li>


      <li id="mainlink" class=" mt-1 cursor-pointer 	text-black duration-300   no-underline   whitespace-nowrap   text-lg p-2 sm:p-3 sm:pl-6 rounded-tr-md rounded-br-md font-normal leading-6">
        <a href="./" class="">
          <i class="ti ti-home h-[24px] w-[24px]  "></i>
          <span>Setting</span>

        </a>
      </li>

    </ul>

    <!-- body sidebar -->

  </aside>


<script>

window.location.pathname;

document.addEventListener('DOMContentLoaded', function () {


    let currentPath = window.location.pathname;

    // Find the corresponding link in the sidebar and add the "active" class
    let sidebarLinks = document.querySelectorAll("#sidebar_dash a");
    let mainlink = document.getElementById("mainlink");


    let toggleSideBar = document.getElementById('toggleSideBarinside');
    let sidebar_dash = document.getElementById('sidebar_dash');

    toggleSideBar.addEventListener('click', onToggle);

    function onToggle() {
        if (sidebar_dash.classList.contains('left-[-100%]')) {
            sidebar_dash.classList.remove('left-[-100%]');
            sidebar_dash.classList.add('left-5');
        } else {
            sidebar_dash.classList.remove('left-5');
            sidebar_dash.classList.add('left-[-100%]');
        }
    }




    //
    // sidebarLinks.forEach(function (link) {
    //     let href = link.getAttribute("href");



    //     // if href empty or contain index that mean
    //     //add active link to dashboard li
    //     if (href.slice(2) === '' || href.slice(2).includes('index')) {
    //         mainlink.classList.add( "text-gray-500");

    //     }

    //     //  //add active link to  similar text
    //     else if (currentPath.includes(href.slice(2))) {

    //         link.parentNode.classList.add( "text-[#0085DB]");
    //         mainlink.classList.remove( "text-[#0085DB]");
    //     }
    // });



});




</script>

  <!--- toggle sidebar script >
