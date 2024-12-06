@extends('layouts.master')

@section('content')
<div class="relative min-h-screen bg-neutral px-10 py-10">
    <div class="absolute z-50 w-full">
        <a href="http://127.0.0.1:8000/cart" class="fixed right-24 top-28">
            <svg class="hover:scale-110 transition-all duration-500" xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 120 120">
                <rect x="30" y="40" width="60" height="50" rx="10" ry="10" fill="#EAF5EF" stroke="#2D6457" stroke-width="4"></rect>
                <path d="M40 40 Q40 25 60 25 Q80 25 80 40" fill="none" stroke="#2D6457" stroke-width="4"></path>
                <circle cx="80" cy="80" r="16" fill="#8ED6F4"></circle>
                <text x="80" y="88" text-anchor="middle" font-size="22" font-family="Arial" fill="#EAF5EF" font-weight="bold">0</text>
            </svg>
        </a>
    </div>
    <div class="flex flex-col justify-center items-center gap-8 mt-20 mx-28 text-primary">
        <h1 class="text-3xl font-semibold">Daftar Pesanan</h1>
        <div class="w-full max-w-4xl p-4 border-2 border-gray-800 rounded-lg shadow-md bg-neutral-light">
            <div class="flex bg-neutral flex-col w-full gap-4">
                <div class="w-full border border-black rounded-lg shadow-md">
                    <div class="flex">
                        <div class="flex items-center justify-center w-1/4 rounded-l-lg p-4">
                            <img src="{{ asset('img/profile/profileImage.png') }}" class="rounded-full w-32 h-32" alt="">
                        </div>
                        <div class="flex-grow flex flex-col justify-between gap-2 px-6 py-4 ">
                            <div class="flex flex-col w-full">
                                <h2 class="text-2xl font-bold">Bernard Bereness</h2>
                                <p class="text-sm text-right text-gray-500">Order ID 1732718282</p>
                            </div>
                            <hr class="border-t-2 border-black w-full" />
                            <div class="flex justify-between items-center">
                                <p class="text-xl text-red-600">Pesanan Sedang Disiapkan</p>
                                <p class="text-sm text-gray-500">03 Desember 2024 - 21:00 PM</p>
                            </div>
                            <div class="flex justify-start">
                                <a href="" class="flex items-center justify-center border hover:border-accent py-2 px-6 rounded-lg hover:text-accent hover:bg-transparent text-white bg-accent transition-all duration-500 whitespace-nowrap">
                                    Detail
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection