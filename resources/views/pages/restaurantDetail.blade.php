@extends('layouts.master')

@section('content')
<div class="min-h-screen py-24 bg-neutral px-10 md:px-50">
    <header class="text-2xl font-bold text-center mt-20 md:mt-10">
        @lang('restaurantDetail.header_title', ['restaurant_name' => $restaurant->name])
    </header>
    <div class="flex flex-col md:flex-row justify-center items-center my-10 gap-16">
        <div class="flex justify-center md:max-w-[30%]">
            <img src="{{ ($restaurant->image) ? $restaurant->image : asset('img/rest_avatar.png') }}" alt="" class="w-[70%] md:max-w-[50%] h-auto">
        </div>
        <div class="md:w-2/3">
            <span>@lang('restaurantDetail.description')</span>
            <p>{{ $restaurant->description }}</p>
            @if ($restaurant->description == null || $restaurant->description == '')
            <div class="bg-white rounded-lg shadow-lg p-4 flex justify-center">
                <h3 class="font-semibold text-lg">@lang('restaurantDetail.no_desc')</h3>
            </div>
            @endif
            <div class="pt-5 flex flex-col md:flex-row gap-10">
                <div class="flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 64 64">
                        <path 
                          d="M32 2C21.059 2 12 11.059 12 22c0 11.645 16.252 31.648 18.403 34.193a2 2 0 0 0 3.194 0C35.748 53.648 52 33.645 52 22 52 11.059 42.941 2 32 2z"
                          fill="#b0b8c5" 
                          stroke="black" 
                          stroke-width="2"
                        />
                        <circle 
                          cx="32" 
                          cy="22" 
                          r="8" 
                          fill="#E3F2FD" 
                          stroke="black" 
                          stroke-width="1.5"
                        />
                    </svg>
                    <span class="text-sm">
                        @lang('restaurantDetail.location', [
                            'restaurant_name' => $restaurant->name,
                            'subdistrict' => $restaurant->subdistrict,
                            'city' => $restaurant->city
                        ])
                    </span>
                </div>
                <div class="flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 64 64">
                        <polygon 
                          points="32,4 39.09,23.26 59,23.26 42.45,36.74 49.54,56 32,42.52 14.46,56 21.55,36.74 5,23.26 24.91,23.26"
                          fill="yellow"
                          stroke="black"
                          stroke-width="2"
                        />
                    </svg>
                    <span>@lang('restaurantDetail.rating'): {{ $restaurant->rating }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="text-2xl font-bold mt-8 mb-3">@lang('restaurantDetail.available_products')</div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
            @foreach ($products as $item)
            <div class="">
                @include('components.product_card', ['product' => $item])
            </div>
            @endforeach
        </div>
        @if (count($products) == 0)
            <div class="bg-white rounded-lg shadow-lg p-4 flex justify-center">
                <h3 class="font-semibold text-lg">@lang('restaurantDetail.no_items')</h3>
            </div>
        @endif
    </div>
</div>
@endsection
