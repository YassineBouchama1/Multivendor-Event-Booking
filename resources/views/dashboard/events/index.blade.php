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

<main class="flex gap-6 flex-col md:flex-row">




    <div class="flex flex-col w-full">
        <div class="overflow-x-auto">
            <div class=" inline-block min-w-full">
                <div class="shadow overflow-hidden">
                    <table class="table-fixed min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th scope="col" class="p-4">
                                    <div class="flex items-center">
                                        <input id="checkbox-all" aria-describedby="checkbox-1" type="checkbox"
                                            class="bg-gray-50 border-gray-300 focus:ring-3 focus:ring-cyan-200 h-4 w-4 rounded">
                                        <label for="checkbox-all" class="sr-only">checkbox</label>
                                    </div>
                                </th>
                                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                    Name
                                </th>
                                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                    Position
                                </th>

                                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                    Status
                                </th>
                                <th scope="col" class="p-4">
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
@forelse($events as $event)
<form method="POst" action="{{route('users.update',['event'=>$event['id']])}}">
    @csrf
    @method('PUT')
                            <tr class="hover:bg-gray-100">
                                <td class="p-4 w-4">
                                    <div class="flex items-center">
                                        <input id="checkbox-" aria-describedby="checkbox-1" type="checkbox"
                                            class="bg-gray-50 border-gray-300 focus:ring-3 focus:ring-cyan-200 h-4 w-4 rounded">
                                        <label for="checkbox-" class="sr-only">checkbox</label>
                                    </div>
                                </td>
                                <td class="p-4 flex items-center whitespace-nowrap space-x-6 mr-12 lg:mr-0">
                                    <div class="text-sm font-normal text-gray-500">
                                        <div class="text-base font-semibold text-gray-900">{{$event['name']}}</div>
                                        <div class="text-sm font-normal text-gray-500">{{$event['email']}}</div>
                                    </div>
                                </td>
                                <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">noraml event</td>
                                <td class="p-4 whitespace-nowrap text-base font-normal text-gray-900">
                                    <div class="flex items-center">

                                        <select  name="status" class="outline-none border-none">
                                            <option value="active" selected={{$event['status'] == 'active'}}>active</option>
                                            <option value="suspended"  selected={{$event['status'] == 'suspended'}}>suspended</option>
                                        </select>
                                                                    </div>
                                </td>
                                <td class="p-4 whitespace-nowrap space-x-2">

                                        <button type="submit" data-modal-toggle="user-modal" class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                                            <svg class="mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                                            Edit Status
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

