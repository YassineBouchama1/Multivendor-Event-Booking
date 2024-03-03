

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

@if($event['status' ]!='approved')
<form method="POST" action="{{route('events.accept',['event'=>$event['id']])}}">
    @csrf
    @method("patch")
    <button  type="submit" data-modal-toggle="delete-user-modal" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
        Accept
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


