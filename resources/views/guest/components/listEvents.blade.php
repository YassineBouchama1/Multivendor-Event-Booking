
<h2 class="text-3xl md:text-6xl font-bold text-center w-full py-8">Explore Our Events</h2>
<h4 class="text-sm font-bold text-center w-full ">Cound: <span>{{ $eventsFil->count() }}</span></h4>



{{-- // if there is a error display it here --}}
@if ($message = Session::get('error'))

<div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
    <span class="font-medium">Success alert!</span> {{$message}}
  </div>
@endif


<section id="Projects"
class=" pb-10 w-fit mx-auto grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 justify-items-center justify-center gap-y-20 gap-x-14 mt-10 mb-5">


@forelse($eventsFil as $event)
{{-- @dd($event) --}}

 {{-- chnage formate date  --}}
 <?php
        $startDate = \Carbon\Carbon::parse($event['start_date']);
        $endDate = \Carbon\Carbon::parse($event['end_date']);
        $hoursDifference = $startDate->diffInHours($endDate);
        // $daysDifference = $startDate->diffInDays($endDate);
        $timeStart = $startDate->format('H:i A');
    ?>
<div class="w-72 bg-white shadow-md rounded-sm duration-500 hover:scale-105 hover:shadow-xl">
    <a href="{{route('home.eventDetails',['event'=>$event['id']])}}">
        <img src="{{asset('events') . '/'.$event['cover']}}"
                alt="Product" class=" h-56 w-72 object-cover rounded-t-sm" />

        <div class="px-4 py-3 w-72 relative">
            <div class="absolute flex items-center justify-between px-2 pb-3 pt-1 bg-white top-[-15%] rounded-md left-2 right-2 ">

              <div class="gap-x-1 flex text-sm items-center"><i class="fa-solid fa-calendar-days text-mainColorhome"></i>{{$startDate->format('d F')}}</div>
              <div class="gap-x-1 flex text-sm items-center"><i class="fa-solid fa-hourglass-end text-mainColorhome""></i>{{$hoursDifference}}H </div>
              <div class="gap-x-1 flex text-sm items-center"><i class="fa-solid fa-clock text-mainColorhome"></i>{{$timeStart}}</div>

            </div>
            <span class="text-gray-400 mr-3 uppercase text-xs mt-4">{{$event['category']->name}}</span>
            <p class="text-lg font-bold text-black truncate block capitalize">{{$event['title']}}</p>
            <p class="text-sm text-black block py-2 line-clamp-2 truncate ">{{$event['description']}}</p>

            <div class="flex items-center border-t-2 p-2 justify-between" >
                <p class="text-sm cursor-auto my-3"><i class="fa-solid fa-location-dot text-mainColorhome"></i> {{$event['location']}}</p>

                @if($event->price == 0)
                    <p class=" cursor-auto my-3 text-mainColorhome">Free</p>
                @else
                <p class="text-sm cursor-auto my-3 text-mainColorhome">${{ $event->price }}</p>
                @endif

            </div>
        </div>
    </a>
</div>



@empty
<td >No events available</td>

@endforelse

</section>
<div class="self-center pb-6 flex flex-col">{{ $eventsFil->links() }}</div>



