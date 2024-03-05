@extends('guest.layouts.dashboard_layout')



@section('content')
<div class="bg-gray-100">
    <div class="container mx-auto py-8">
        <div class="grid grid-cols-4 sm:grid-cols-12 gap-6 px-4">
            <div class="col-span-4 sm:col-span-3">
                <div class="bg-white shadow rounded-lg p-6">
                    <div class="flex flex-col items-center">
                        <img src="https://randomuser.me/api/portraits/men/94.jpg" class="w-32 h-32 bg-gray-300 rounded-full mb-4 shrink-0">

                        </img>
                        <h1 class="text-xl font-bold">{{$user->name}}</h1>
                        <p class="text-gray-700"><span class="font-bold">Address: </span>{{$user->address}}</p>

                    </div>
                    <hr class="my-6 border-t border-gray-300">
                    <div class="flex flex-col">
                        <ul>
                            <li class="text-gray-700 cursor-pointer  hover:text-mainColorhome uppercase font-bold tracking-wider mb-2"><a  href="{{url('/user')}}">Profile</a></li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-span-4 sm:col-span-9">
                <div class="bg-white shadow rounded-lg p-6">
                    <h2 class="text-2xl font-bold mb-4 text-mainColorhome">Reservations</h2>
                    <hr class="my-6 border-t border-gray-300">
                    @include('guest.components.tableReservations')

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection