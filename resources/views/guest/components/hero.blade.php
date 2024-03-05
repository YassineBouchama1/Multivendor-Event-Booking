<div
    class="relative overflow-hidden bg-cover bg-no-repeat"
    style="
      background-position: 50%;
      background-image: url('https://tecdn.b-cdn.net/img/new/slides/146.webp');
      height: 350px;
    ">
    <div
      class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-fixed"
      style="background-color: rgba(0, 0, 0, 0.75)">
      <div class="flex h-full items-center justify-center">
        <form method="GET" action="{{route('home.index')}}"
        class=" text-center flex justify-between items-center  mx-4 h-14 rounded-sm bg-white">
          <div class="border-r-2">

    <select
    name="category_id"
    class="w-auto border-none outline-none ocus:ring-white focus:border-white hover:cursor-pointer">
      <option selected value="null" >All categories</option>
      @foreach($categories as $category)

      <option {{ (request()->get('category_id') == $category->id) ? 'selected' : '' }}
        value="{{ $category->id }}">{{ $category->name }}</option>


      @endforeach
    </select>


          </div>

          {{-- searhc input --}}
          <div class="border-r-2 w-full flex flext-start items-center">
            <i class="fa-solid fa-magnifying-glass text-xl px-3"></i>
            <input type="text"
            value="{{request()->get('search')}}"
             class="w-[80%] bg-white rounded-lg focus:outline-white border-white focus:border-white	 hover:cursor-pointer"
             name="search">
        </div>
          <button type="submit" class="w-1/4 bg-mainColorhome text-white h-full self-end">Find Event</button>
        </form>
      </div>

    </div>
  </div>

