@extends('admin/layouts/dashboard_layout')

@section('content')
<div class="flex flex-col justify-start items-start ">
    <h2 class="text-3xl font-bold">Analytics</h2>

<div class="py-4 flex flex-col gap-y-6">
<div class="flex gap-x-6 w-full  overflow-auto [&::-webkit-scrollbar]:hidden [-ms-overflow-style:'none'] [scrollbar-width:'none']">

<div class="w-80 h-52 bg-white rounded-lg"></div>
<div class="w-80 h-52 bg-white rounded-lg"></div>
<div class="w-80 h-52 bg-white rounded-lg"></div>
{{-- <div class="w-80 h-52 bg-white rounded-lg"></div> --}}



</div>

<div> charts</div>


@include('admin.components.events', $events)







</div>

  </div>
@endsection
