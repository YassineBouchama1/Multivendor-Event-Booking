@extends('organizer.layouts.dashboard_layout')


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
reservations
@endsection

<main class="flex gap-6 flex-col md:flex-row">




    <div class="flex flex-col w-full">
        <div class="overflow-x-auto">
            <div class=" inline-block min-w-full">
                <div class="shadow overflow-hidden">
                    <table class="table-fixed min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>

                                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                   Name User
                                </th>
                                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                    title Event
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
@forelse($reservations as $reservation)

                            <tr class="hover:bg-gray-100">

                                <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">
{{$reservation->user['name']}}

                                </td>
                                <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">{{$reservation->event['title']}}</td>
                                <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">{{$reservation->event['city']}}</td>
                                <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">{{$reservation->event['category']->name}}</td>
                                <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">{{$reservation['status']}}</td>

                                <td class="p-4 whitespace-nowrap space-x-2 flex  flex-row">

                                    @if($reservation['status' ]==='unconfirmed')
<form class="" method="POST" action="{{route('reservations.confirmed',['reservation'=>$reservation['id']])}}">
    @csrf
    @method("PATCH")
    <button  type="submit" data-modal-toggle="delete-user-modal" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
        ACCEPT
    </button>
</form>
@endif


@if($reservation['status' ] ==='canceled' || $reservation['status' ] !='used')
<form method="POST" action="{{route('reservations.canceled',['reservation'=>$reservation['id']])}}">
    @csrf
    @method("PATCH")
    <button  type="submit" data-modal-toggle="delete-user-modal" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
        cancele
    </button>
</form>
@endif


                                </td>
                            </tr>

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

