@extends('layouts.master')

@section('content')
<div class="min-h-screen bg-neutral p-24 font-poppins">
    <a href="">
        <svg class="w-12 h-12 text-primary" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4"/>
        </svg>      
    </a>
    <h1 class="text-center p-4 font-semibold text-4xl">Keranjang</h1>
    <div class="flex flex-col gap-4">
        @foreach ($carts as $item)
        <div class="rounded-lg border border-black bg-white h-1/2 p-4">
            <div class="flex flex-col gap-4">
                <div class="flex flex-row items-center gap-2">
                    <h2 class="font-semibold text-3xl">{{ $item['restaurant']->name }}</h2>
                </div>
                <div class="grid grid-cols-3 gap-4">
                    @foreach ($item['carts'] as $cart)
                        @include('components.cart_card', ['cart' => $cart])
                    @endforeach
                </div>
                <div class="flex justify-between">
                    <h2 class="font-semibold text-3xl">Total ({{ $item['carts']->sum('quantity') }} items)</h2>
                    <h2 class="font-semibold text-3xl">Rp {{ number_format($item['total_price'], 0, ',', '.') }},00</h2>
                </div>
                <hr class="w-full h-1 bg-black">
                <button class="bg-tertiary text-white ml-auto py-4 px-8 rounded-xl hover:text-tertiary hover:bg-transparent border hover:border-tertiary transition-all duration-500">
                Checkout
                </button>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

<style>
    .quantity input[type=number]::-webkit-inner-spin-button, 
    .quantity input[type=number]::-webkit-outer-spin-button { 
        -webkit-appearance: none; 
        margin: 0; 
    }
</style>


<script>
    function updateQuantity(action, product_id) {
        var input = document.getElementById('quantity-' + product_id);
        var currentQuantity = parseInt(input.value);

        if (action === 'decrease' && currentQuantity > 1) {
            input.value = currentQuantity - 1;
        } else if (action === 'increase' && currentQuantity < input.max) {
            input.value = currentQuantity + 1;
        }

        var form = document.getElementById('inputQuantity-' + product_id);
        form.submit();
    }
</script>