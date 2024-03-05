
<h2 class="text-3xl md:text-6xl font-bold text-center w-full py-8">Explore Our Events</h2>



<section id="Projects"
    class="w-fit h-full mb-10 flex justify-center flex-col items-center">
<div    class=" pb-10 w-fit mx-auto grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 justify-items-center justify-center gap-y-20 gap-x-14 mt-10 mb-5">
<div id="events-container"></div>
<div id="pagination-links"></div>
<h4>Cound: <span>{{ $events->count() }}</span></h4>


    @forelse($events as $event)


<div class="w-72 bg-white shadow-md rounded-sm duration-500 hover:scale-105 hover:shadow-xl">
    <a href="#">
        <img src="https://images.unsplash.com/photo-1646753522408-077ef9839300?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwcm9maWxlLXBhZ2V8NjZ8fHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=500&q=60"
                alt="Product" class=" h-56 w-72 object-cover rounded-t-sm" />

        <div class="px-4 py-3 w-72 relative">
            <div class="absolute flex items-center justify-between px-2 pb-3 pt-1 bg-white top-[-15%] rounded-md left-2 right-2 ">

              <div class="gap-x-1 flex text-sm items-center"><i class="fa-solid fa-calendar-days text-mainColorhome"></i>27 Jan</div>
              <div class="gap-x-1 flex text-sm items-center"><i class="fa-solid fa-calendar-days text-mainColorhome"></i>27 Jan</div>
              <div class="gap-x-1 flex text-sm items-center"><i class="fa-solid fa-calendar-days text-mainColorhome"></i>27 Jan</div>

            </div>
            <span class="text-gray-400 mr-3 uppercase text-xs mt-4">{{$event['category']->name}}</span>
            <p class="text-lg font-bold text-black truncate block capitalize">{{$event['title']}}</p>
            <p class="text-sm  text-black  block py-2">Loremolorum rem amet vero assumenda consequatur quisquam labore s.</p>

            <div class="flex items-center border-t-2 p-2 justify-between" >
                <p class="text-sm cursor-auto my-3"><i class="fa-solid fa-location-dot text-mainColorhome"></i>Wilton , United States</p>

                    <p class="text-sm cursor-auto my-3 text-mainColorhome">$199</p>

            </div>
        </div>
    </a>
</div>



@empty
<td class="hover:bg-gray-100">No user available</td>

@endforelse
</div>
{{ $events->links() }}



