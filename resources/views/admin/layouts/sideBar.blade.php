

<aside id="sidebar_dash" class="section w-60 left-0  bg-white transition-all duration-300 ease-in-out fixed z-40 max-lg:-translate-x-full max-lg:bg-surface-500 dark:max-lg:bg-surfacedark-500   top-0 bottom-0 h-screen  overflow-auto  ">
    <div class="h-[100px] p-5 flex justify-between ">
      <a class="text-center w-full " href="/admin">

        <h1 class="text-2xl font-medium tracking-wide text-gray-900 dark:text-gray-100 compact-hide ml-2">LOGO</h1>
      </a>
      <button id="toggleSideBarinside"><i class="lg:hidden  flex ti ti-x text-xl cursor-pointer  "> </i></button>

    </div>

    <!-- body sidebar -->
    <ul class="h-full  flex  flex-col   overflow-y-auto pr-5 w-full text-white">
        <li id="mainlink" class="{{ Request::is('admin') ? 'bg-mainColorDashboard text-white' : '' }} mt-1 cursor-pointer text-black duration-300 no-underline whitespace-nowrap text-lg p-2 sm:p-3 sm:pl-6 rounded-tr-md rounded-br-md font-normal leading-6">
            <a href="/admin" class="">
              <i class="ti ti-home h-[24px] w-[24px]"></i>
              <span>Dashboard</span>
            </a>
          </li>


      <li id="mainlink" class="{{ Route::is('users.index') ? 'bg-mainColorDashboard text-white' : '' }} mt-1 cursor-pointer 	text-black duration-300   no-underline   whitespace-nowrap   text-lg p-2 sm:p-3 sm:pl-6 rounded-tr-md rounded-br-md font-normal leading-6">
        <a href="{{route('users.index')}}" class="">
          <i class="ti ti-home h-[24px] w-[24px]  "></i>
          <span>Users</span>

        </a>
      </li>
      <li id="mainlink" class="{{ Route::is('categories.index') ? 'bg-mainColorDashboard text-white' : '' }} mt-1 cursor-pointer 	text-black duration-300   no-underline   whitespace-nowrap   text-lg p-2 sm:p-3 sm:pl-6 rounded-tr-md rounded-br-md font-normal leading-6">
        <a href="{{route('categories.index')}}" class="">
          <i class="ti ti-home h-[24px] w-[24px]  "></i>
          <span>Categories</span>

        </a>
      </li>



    </ul>

    <!-- body sidebar -->

  </aside>


