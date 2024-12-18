@extends('layouts.master')

@section('content')
<div class="min-h-screen bg-neutral px-4 py-10">
    <div class="flex flex-col justify-center items-center gap-8 mt-20 mx-auto text-primary max-w-screen-lg">
        <h1 class="text-3xl font-semibold text-center mt-6">Restaurant</h1>
        <div class="w-full md:w-4/6 mx-auto">
            <div class="flex items-center justify-center gap-6 w-full">
                <!-- Search input -->
                <form class="relative w-4/6" method="GET" action="{{ route('searchRestaurant') }}">
                    @csrf
                    <input type="search" name="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-s-lg border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Search" required />
                    <button type="submit" class="absolute top-0 right-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </form>

                <!-- Filter button -->
                <button id="filter-dropdown" data-dropdown-toggle="filterDropdown" class="flex-shrink-0 gap-1 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-neutral-light bg-skyBlue border border-gray-300 rounded-e-lg focus:ring-4 focus:outline-none focus:ring-gray-100" type="button">
                    <p>Urutkan</p>
                    <svg class="w-5 h-5 text-neutral-light" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M18.796 4H5.204a1 1 0 0 0-.753 1.659l5.302 6.058a1 1 0 0 1 .247.659v4.874a.5.5 0 0 0 .2.4l3 2.25a.5.5 0 0 0 .8-.4v-7.124a1 1 0 0 1 .247-.659l5.302-6.059c.566-.646.106-1.658-.753-1.658Z"/>
                    </svg>
                </button>
            </div>
            <!-- Dropdown menu for filter -->
            <div id="filterDropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="filter-dropdown">
                    <li>
                        <form action="{{ route('restaurantSort') }}" method="GET">
                            @csrf
                            <input type="hidden" id="restaurants_ids" name="restaurant_ids">
                            <button type="submit" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Rating</button>
                        </form>
                    </li>
                    <li>
                        <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Popular</button>
                    </li>
                    <li>
                        <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Most Buy</button>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Restoran List Header -->
        <div class="flex justi">
            <div class="flex flex-row gap-2 items-center">
                <p class="text-accent text-md font-semibold">Kategori: </p>
                <div class="flex flex-row gap-2 max-w-[80%] overflow-x-auto">
                    @foreach ($categories as $category)
                    <form action="{{ route('restaurantFilter', ['id' => $category->id]) }}" method="GET">
                        <button type="submit" class="{{ (isset($selectedCategory) && $selectedCategory->id == $category->id) ? 'bg-accent text-white' : 'text-accent bg-transparent border-accent' }}  text-xs p-1 rounded-lg font-semibold hover:bg-accent  hover:text-white border transition-all duration-500">{{ $category->name }}</button>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
        
        <!-- Restoran List Grid -->
        <div class="w-5/6 grid grid-cols-1 md:grid-cols-2 items-center gap-x-4 gap-y-6">
            @foreach ($restaurants as $item)
            <input type="hidden" value="{{ $item->id }}" name="restaurant_id">
            <a href="{{ route('restaurantDetailPage', ['id' => $item->id]) }}" class="flex flex-col gap-2 p-4 rounded-lg bg-neutral-light border border-black shadow-md">
                <div class="flex justify-center">
                    <img src="{{ ($item->image) ? $item->image : asset('img/rest_avatar.png') }}" alt="" class="w-[200px] h-[200px] rounded-xl hover:scale-105 transition-all duration-500">
                </div>
                <div class="flex justify-between text-primary">
                    <h2 class="font-extrabold text-xl">{{ $item->name }}</h2>
                    <div class="flex flex-row gap-2 items-center">
                        <svg class="w-6 h-6 text-sunshine" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24" stroke="black" stroke-width="1.5">
                            <path d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"/>
                        </svg>
                        <p>{{ $item->rating }}</p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="flex justify-center mt-6">
            {{ $restaurants->links('pagination::tailwind') }}
        </div>
    </div>
</div>


@endsection
