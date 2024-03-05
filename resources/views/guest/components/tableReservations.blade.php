


<div class="flex flex-col w-full">
    <div class="overflow-x-auto">
        <div class=" inline-block min-w-full">
            <div class="shadow overflow-hidden">
                <table class="table-fixed min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>

                            <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                #Id
                            </th>
                            <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                title Event
                            </th>
                            <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                Price
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
@forelse($user->reservations as $reservation)

                        <tr class="hover:bg-gray-100">
                            <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">{{$reservation->id}}</td>

                            <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">
{{$reservation->event['title']}}

                            </td>
                            <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">{{$reservation->event['price']}}</td>
                            <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">{{$reservation->event['city']}}</td>
                            <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">{{$reservation->event['category']->name}}</td>
                            <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">{{$reservation['status']}}</td>

                            <td class="p-4 whitespace-nowrap space-x-2 flex  flex-row">

                                @if($reservation['status' ] !='unconfirmed')
<a href="{{route('ticketPdf',['reservation'=>$reservation->id])}}"
    target="_blank"
    >Download Ticket</a>


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

