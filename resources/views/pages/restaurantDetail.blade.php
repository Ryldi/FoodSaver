@extends('layouts.master')

@section('content')
<div class="min-h-screen py-24 bg-neutral font-poppins px-24">
    <header class="text-2xl font-bold text-center mt-5">J.CO</header>
    <div class="flex justify-center items-center my-10 gap-16">
        <img src="{{ asset('img/restaurant/logo/Jco.png') }}" alt="" class="w-[15%] h-[15%]">
        <div class="w-[60%]">
            <span>J.CO Donuts & Coffee adalah salah satu merek makanan dan minuman ternama asal Indonesia yang dikenal dengan aneka donat lezat, kopi berkualitas, dan yogurt beku yang menggugah selera. Didirikan pada tahun 2005, J.CO mengusung konsep modern dengan cita rasa yang unik, memadukan bahan-bahan segar dan resep inovatif untuk menciptakan donat lembut dengan berbagai topping menarik. </span>
            <div class="pt-5 flex gap-10">
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
                      
                    <span>J.CO Mall Central Park</span>
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
                    <span>4.6</span>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="text-2xl font-bold mt-8 mb-3">Produk Tersedia</div>
        <div class="m-10">
            @include('components.product_card')
        </div>
    </div>
</div>
@endsection