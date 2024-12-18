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
            @foreach ($transactions as $transaction)
                @include('components.order_card', ['transaction' => $transaction])
            @endforeach
    </div>

</div>

@endsection