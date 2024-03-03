@extends('dashboard.layouts.dashboard_layout')

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
Events
@endsection

<div class="flex justify-end"><a href="{{route('events.create')}}"
    class="bg-mainColorDashboard text-white px-4 py-2 flex justify-center items-center rounded-lg"
    >Add New Event</a></div>
<main class="flex gap-6 flex-col md:flex-row">




    <div class="flex flex-col w-full">
        <div class="overflow-x-auto">
            <div class=" inline-block min-w-full">
                <div class="shadow overflow-hidden">
                    <table class="table-fixed min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>

                                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                    title
                                </th>
                                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                    price
                                </th>

                                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                    places
                                </th>
                                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                    city
                                </th>
                                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                    category
                                </th>
                                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                    Status
                                </th>
                                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
@forelse($events as $event)
<form method="POst" action="{{route('events.update',['event'=>$event['id']])}}">
    @csrf
    @method('PUT')
                            <tr class="hover:bg-gray-100">

                                <td class="p-4 flex items-center whitespace-nowrap space-x-6 mr-12 lg:mr-0">
                                    <div class="text-sm font-normal text-gray-500">
                                        <img class="h-10 w-10 rounded-full" src="{{ asset('events').'/'.$event['cover'] }}"  alt=" avatar">

                                        <div class="text-base font-semibold text-gray-900">{{$event['title']}}</div>
                                    </div>
                                </td>
                                <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">{{$event['price']}}</td>
                                <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">{{$event['places']}}</td>
                                <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">{{$event['city']}}</td>
                                <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">{{$event['category']->name}}</td>
                                <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">{{$event['status']}}</td>

                                <td class="p-4 whitespace-nowrap space-x-2">

                                        <a     href="{{route('events.edit',['event'=>$event['id']])}}"  class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                                            <svg class="mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                                            Edit
                                        </a>

                                        <button type="button" data-modal-toggle="delete-user-modal" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                                            <svg class="mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                            Delete user
                                        </button>


                                </td>
                            </tr>
                        </form>
@empty
<td class="hover:bg-gray-100">No user available</td>

@endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</main>

@endsection

