@extends('layouts.master')

@section('content')
<div class="min-h-screen py-24 bg-neutral font-poppins px-24">
    <a href="">
        <svg class="w-12 h-12 text-primary" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4"/>
        </svg>      
    </a>
    <h1 class="text-center p-4 font-semibold text-4xl">Keranjang</h1>
    <form action="" class="flex flex-col gap-4 rounded-lg border border-black bg-white h-1/2 p-4">
        <div class="flex flex-row items-center gap-2">
            <input id="vue-checkbox-list" type="checkbox" value="" class="w-8 h-8 text-primary bg-gray-100 border-gray-300 rounded focus:ring-primary">
            <h2 class="font-semibold text-3xl">J.CO Central Park Mall</h2>
        </div>
        <div class="grid grid-cols-3 gap-4">
            @include('components.cart_card')
            @include('components.cart_card')
            @include('components.cart_card')
        </div>
        <div class="flex justify-between">
            <h2 class="font-semibold text-3xl">Total (20 items)</h2>
            <h2 class="font-semibold text-3xl">Rp 120.000,00</h2>
        </div>
        <hr class="w-full h-1 bg-black">
        <button class="bg-tertiary text-white ml-auto text-xs py-4 px-8 rounded-xl hover:text-tertiary hover:bg-transparent border hover:border-tertiary transition-all duration-500">
           Checkout
        </button>
    </form>
</div>
@endsection