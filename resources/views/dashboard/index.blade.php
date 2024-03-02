@extends('dashboard/layouts/dashboard_layout')

@section('content')
<div class="flex flex-row justify-between items-center pt-2 pb-6">
    <h2 class="text-title-lg">Analytics</h2>

    <!-- filter -->
    <div class="btn-segmented inline-flex flex-row items-center">
      <div class="segmented-item [&amp;.active]:bg-secondary-100 dark:[&amp;.active]:bg-secondary-700 h-8 btn-outline relative inline-flex flex-row items-center justify-center gap-x-2 py-2 px-4 text-sm tracking-[.00714em] font-medium border border-gray-500 text-primary-600 dark:border-gray-400 dark:text-primary-200">
        <input id="check7" type="radio" name="radios" class="z-10 opacity-0 absolute inset-0" value="1" checked="">
        <label class="flex items-center gap-3" for="check7">
          7 Days
        </label>
      </div>
      <div class="segmented-item [&amp;.active]:bg-secondary-100 dark:[&amp;.active]:bg-secondary-700 h-8 btn-outline relative inline-flex flex-row items-center justify-center gap-x-2 py-2 px-4 text-sm tracking-[.00714em] font-medium border border-gray-500 text-primary-600 dark:border-gray-400 dark:text-primary-200 active">
        <input id="check8" type="radio" name="radios" class="z-10 opacity-0 absolute inset-0" value="2">
        <label class="flex items-center gap-3" for="check8">
          14 Days
        </label>
      </div>
    </div>
  </div>
hola dahsborda
@endsection
