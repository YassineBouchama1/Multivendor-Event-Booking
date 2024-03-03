@extends('admin.layouts.dashboard_layout')

@section('content')
{{-- display msg errors --}}

@if($errors->any())

<ul>
    @foreach ($errors->all() as $error)

        <li class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <span class="font-medium">Danger alert!</span> {{ $error }}
          </li>
@endforeach
</ul>

@endif
@if ($message = Session::get('success'))

<div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
    <span class="font-medium">Success alert!</span> {{$message}}
  </div>
@endif



{{-- //passing title of this page --}}
@section('title')
Categories
@endsection

<main class="flex gap-6 flex-col md:flex-row">




     <form class=" basis-1/3 " action="{{route('categories.store')}}"   method="POST">
@csrf
  <div class="p-4  bg-white rounded-sm transition-shadow box-border color-opacity-87   shadow-md backdrop-blur-md">
     <h4 class="mb-4 text-3xl font-semibold text-gray-500">Create Categories</h4>
     <hr>
     <label for="name"
     class="flex flex-col gap-y-1 mt-2 font-bold text-gray-400">
          Name
         <input  type="text" id="name" name="name"
     class="rounded-sm border-md border-gray-200 forced-colors:text-blue-600"
         placeholder="Enter name">
     </label>

     <button type="submit"
     class="bg-mainColorDashboard rounded-md w-full text-white flex justify-center
     items-center mt-4 px-4 py-1 transition-shadow box-border color-opacity-87   shadow-md shadow-blue-300"
     ><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
      <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
      <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
      <path d="M14 4l0 4l-6 0l0 -4" />
    </svg>Save</button>
  </div>
</form>





    <div class="w-full overflow-x-auto p-4 flex flex-col basis-4/3 bg-white rounded-sm transition-shadow box-border color-opacity-87   shadow-md backdrop-blur-md">

        <table class="w-full whitespace-no-wrap  table-fixed min-w-auto divide-y divide-gray-200">
            <thead class="">
                <tr  >
          <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">Name</th>

          <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">Action</th>
        </tr>
    </thead>
    <tbody
    class="bg-white divide-y divide-gray-200 "
    >
    @forelse ($categories as $item)
      <tr class="text-gray-700 dark:text-gray-400">
        <td class="px-4 py-3">

            <div class="flex flex-col justify-center">

              <p class="font-semibold">{{$item['name']}}</p>
            </div>

        </td>


    <td>
        <form method="POST"
        action="{{route('categories.destroy',['category'=>$item['id']])}}"
            >
            @csrf()
            @method('delete')
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                <svg class="mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>

                Delete
            </button>
        </form>

        {{-- <a class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded inline-flex items-center" href="{{route('menus.index',['menu'=>$item['id']])}}">Update</a> --}}

    </td>
</tr>
@empty
<tr>
    <td colspan="6" class="px-4 py-3 text-xs">
        No data available
    </td>
</tr>
@endforelse

</tbody>
</table>
</div>
</main>

@endsection

