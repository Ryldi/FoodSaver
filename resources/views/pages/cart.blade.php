@extends('layouts.master')

@section('content')

<div class="min-h-screen bg-neutral py-28 md:py-32 font-poppins">
    <h1 class="text-center p-4 font-semibold text-4xl">@lang('cart.cart')</h1>
    <div class="flex flex-col gap-4 p-4">
        @foreach ($carts as $item)
        <div class="rounded-lg border border-black bg-white h-1/2 p-4">
            <div class="flex flex-col gap-4">
                <div class="flex flex-row items-center gap-2">
                    <h2 class="font-semibold text-3xl">{{ $item['restaurant']->name }}</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
                    @foreach ($item['carts'] as $cart)
                        @include('components.cart_card', ['cart' => $cart])
                    @endforeach
                </div>
                <div class="flex flex-col items-center md:flex-row md:justify-between">
                    <h2 class="font-semibold text-2xl">@lang('cart.total_items', ['count' => $item['carts']->sum('quantity')])</h2>
                    @isset($item['coupon'])
                    <div class="flex gap-2">
                        <h2 class="text-accent font-semibold text-2xl">Rp {{ number_format(($item['total_price'] - ($item['total_price'] * $item['coupon']->percent / 100) > $item['coupon']->max_disc) ? $item['total_price'] - $item['coupon']->max_disc : $item['total_price'] - ($item['total_price'] * $item['coupon']->percent / 100) , 0, ',', '.') }},00</h2>
                        <h2 class="line-through text-lg">Rp {{ number_format($item['total_price'], 0, ',', '.') }},00</h2>
                    </div>
                    @else
                    <h2 class="font-semibold text-2xl">Rp {{ number_format($item['total_price'], 0, ',', '.') }},00</h2>
                    @endisset
                </div>
                <hr class="w-full h-1 bg-black">
                @isset($item['coupon'])
                <div class="flex flex-row items-center gap-2 bg-tertiary text-white px-5 py-2.5 rounded-lg">
                    <p>Kupon {{ $item['coupon']->restaurant->name }} dengan potongan hingga {{ $item['coupon']->percent }}% berhasil digunakan</p>
                </div>
                @endisset
                <button data-modal-target="select-modal-{{ $item['restaurant']->id }}" data-modal-toggle="select-modal-{{ $item['restaurant']->id }}" class="flex justify-between text-white bg-tertiary hover:text-tertiary hover:bg-transparent border hover:border-tertiary transition-all duration-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                    <span>@lang('cart.promo_voucher')</span> 
                    <span>&gt;&gt;&gt;</span>
                </button>
                @include('components.cart_coupon_modal', ['cart' => $item])
                <form class="flex justify-end" action="{{ route('checkout') }}" method="POST" onsubmit="checkout({{ json_encode($item['carts']->toArray()) }})">
                    @csrf
                    <input type="hidden" name="restaurant_id" value="{{ $item['restaurant']->id }}">
                    <input type="hidden" name="total_price" value="{{ $item['total_price'] }}">
                    @isset($item['coupon'])
                        <input type="hidden" name="coupon_id" value="{{ $item['coupon']->id }}">
                    @endisset
                    <button type="submit" class="bg-tertiary text-white ml-auto py-4 px-8 rounded-xl hover:text-tertiary hover:bg-transparent border hover:border-tertiary transition-all duration-500">
                        @lang('cart.checkout')
                    </button>
                </form>
            </div>
        </div>
        @endforeach
        @if (count($carts) == 0)
            <div class="container bg-white rounded-lg shadow-lg p-4 flex justify-center">
                <h3 class="font-semibold text-lg">@lang('cart.no_items')</h3>
            </div>
        @endif
    </div>
</div>

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

    function checkout(data) {
        localStorage.setItem('cart', JSON.stringify(data));
        window.location.href = '/checkout';
    }
</script>
@endsection
