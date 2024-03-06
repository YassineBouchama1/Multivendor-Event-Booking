@extends('organizer.layouts.dashboard_layout')

@section('content')
{{-- display msg errors --}}

@if ($errors->any())

<ul>
    @foreach ($errors->all() as $error)

        <li class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <span class="font-medium">Danger alert!</span> {{ $error }}
          </li>
    @endforeach
</ul>

@endif

{{-- //passing title of this page --}}
@section('title')
Update Event
@endsection






<form  method="POST"  action="{{route('events.update',['event'=>$event['id']])}}"
enctype="multipart/form-data"
   class="h-auto w-full p-4 flex flex-col md:flex-row justify-between gap-4 ">
    @csrf()
    @method('PUT')
    <div class="rounded-md w-full p-4 bg-white transition-shadow box-border color-opacity-87   shadow-md backdrop-blur-md">
<label for="Title"
class="flex flex-col gap-y-1 mt-8">
     Title
    <input  type="text" id="title" name="title" value="{{$event['title']}}"
class="rounded-sm border-md border-gray-200 forced-colors:text-blue-600"
    placeholder="Enter title">
</label>


<label for="price"
class="flex flex-col gap-y-1 mt-8">
price
    <input  type="number" id="price" name="price"  value="{{$event['price']}}"
class="rounded-sm border-md border-gray-200 forced-colors:text-blue-600"
    placeholder="Enter price">
</label>
<label for="places"
class="flex flex-col gap-y-1 mt-8">
Places Number
    <input  type="number" id="places" name="places"  value="{{$event['places']}}"
class="rounded-sm border-md border-gray-200 forced-colors:text-blue-600"
    placeholder="Enter places">
</label>

<label for="city"
class="flex flex-col gap-y-1 mt-8">
location
    <input  type="text" id="location" name="location"  value="{{$event['location']}}"
class="rounded-sm border-md border-gray-200 forced-colors:text-blue-600"
    placeholder="Enter location">
</label>
<label for="places"
class="flex flex-col gap-y-1 mt-8">
start date
    <input  type="datetime-local" id="start_date" name="start_date"  value="{{$event['start_date']}}"
class="rounded-sm border-md border-gray-200 forced-colors:text-blue-600"
    placeholder="Enter start date">
</label>
<label for="places"
class="flex flex-col gap-y-1 mt-8">
start end
    <input  type="datetime-local" id="start_end" name="start_end"  value="{{$event['start_end']}}"
class="rounded-sm border-md border-gray-200 forced-colors:text-blue-600"
    placeholder="Enter start end">
</label>
{{-- selector method accept? --}}

<div class="flex justify-start flex-col md:flex-row md:items-center items-start gap-x-4">
    <label for="reservation_method"
    class="flex flex-col gap-y-1 mt-8">
    Accepte Reservation Method
    <div class="grid grid-cols-1 gap-4 text-center sm:grid-cols-3">
        <div>
          <label
            for="Option1"
            class="block w-full cursor-pointer rounded-lg border border-gray-200 p-3 text-gray-600 hover:border-black has-[:checked]:border-black has-[:checked]:bg-black has-[:checked]:text-white"
            tabindex="0"
          >
            <input {{ $event->reservation_method == 'automatic' ? 'checked' : '' }} value="automatic" class="sr-only" id="Option1" type="radio" tabindex="-1" name="reservation_method" />

            <span class="text-sm">automatic</span>
          </label>
        </div>

        <div>
          <label
            for="Option2"
            class="block w-full cursor-pointer rounded-lg border border-gray-200 p-3 text-gray-600 hover:border-black has-[:checked]:border-black has-[:checked]:bg-black has-[:checked]:text-white"
            tabindex="0"
          >
            <input {{ $event->reservation_method == 'manual' ? 'checked' : '' }} value="manual" class="sr-only" id="Option2" type="radio" tabindex="-1" name="reservation_method" />

            <span class="text-sm">manual</span>
          </label>
        </div>


      </div>

{{-- selector method accept? --}}
    </label>

    <label for="category_id"
    class="flex flex-col gap-y-1 mt-8">
    Categories
    <select class="rounded-sm border-md border-gray-200 forced-colors:text-blue-600" id="category_id" name="category_id">
        <option disabled>Select Category</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ $event->category_id == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>

    </label>

</div>


<label for="description"
class="flex flex-col gap-y-1 mt-8">
description
    <textarea rows="4"  type="text" id="description" name="description"
class="rounded-sm border-md border-gray-200 forced-colors:text-blue-600"
    placeholder="Enter description">  {{$event['description']}}</textarea>
</label>


<label for="password_confirmation"
class="flex flex-col lg:flex-row gap-y-1 mt-8 ">







</label>
    </div>

    <div class=" basis-1/3 	flex  flex-col gap-6">

<div class="p-4 flex items-center flex-col bg-white rounded-sm transition-shadow box-border color-opacity-87   shadow-md backdrop-blur-md">
    <input name="cover" type="file" value="{{$event['cover']}}">
    <img class="h-32 w-auto rounded-full" src="{{ asset('events').'/'.$event['cover'] }}"  alt=" avatar">



 </div>

 <div class="p-4 h-40 bg-white rounded-md transition-shadow box-border color-opacity-87   shadow-md backdrop-blur-md">
    <h4 class="mb-4 text-3xl font-semibold text-gray-500">Create</h4>
    <hr>

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



    </div>
   </from>




@endsection
