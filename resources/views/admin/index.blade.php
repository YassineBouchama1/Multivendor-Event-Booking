@extends('admin/layouts/dashboard_layout')

@section('content')


<div class="flex flex-col justify-start items-start ">
    <h2 class="text-3xl font-bold pb-4">Analytics</h2>


<div class="flex items-center gap-4 w-full">

    <div
    class="w-full rounded-lg shadow-xs overflow-hidden bg-white dark:bg-gray-800"
  >
    <div class="p-4 flex items-center">
      <div
        class="p-3 rounded-full text-orange-500 dark:text-orange-100 bg-orange-100 dark:bg-orange-500 mr-4"
      >

        <i class="fa-solid fa-calendar-days"></i>
      </div>
      <div>
        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
          Events
        </p>
        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
          {{$eventCount}}
        </p>
      </div>
    </div>
  </div>

 <div
    class="w-full rounded-lg shadow-xs overflow-hidden bg-white dark:bg-gray-800"
  >
    <div class="p-4 flex items-center">
      <div
        class="p-3 rounded-full text-green-500 dark:text-green-100 bg-green-100 dark:bg-green-500 mr-4"
      >
      <i class="fa-solid fa-user"></i>
      </div>
      <div>
        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
          Users
        </p>
        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
          {{$usersCount}}

        </p>
      </div>
    </div>
  </div>

  <div
  class="w-full rounded-lg shadow-xs overflow-hidden bg-white dark:bg-gray-800"
>
  <div class="p-4 flex items-center">
    <div
      class="p-3 rounded-full text-green-500 dark:text-green-100 bg-green-100 dark:bg-green-500 mr-4"
    >
    <i class="fa-solid fa-sitemap"></i>
    </div>
    <div>
      <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
          Organizers
      </p>
      <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
        {{$organizersCount}}

      </p>
    </div>
  </div>
</div>


</div>
</div>
<div class=" flex justify-center  w-4/6 ">
    <canvas id="myChart" height="100px"></canvas>


   </div>
        @include('admin.components.events', $events)











@endsection
