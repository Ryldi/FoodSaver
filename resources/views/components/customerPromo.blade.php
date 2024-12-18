<div class="min-h-screen bg-neutral px-10 py-10">
    

    <div class="flex flex-col justify-center items-center gap-8 mt-20 mx-28 text-primary">
        <h1 class="text-3xl font-semibold">Promo</h1>
        <form class="w-4/6 mx-auto">
            <div class="flex gap-4">
                <div class="relative w-full">
                    <input type="search" id="search-dropdown" 
                           class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-s-lg border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                           placeholder="Search" required />
                    <button type="submit" 
                            class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </button>
                </div>
                
                @if (!request()->routeIs('myPromoPage'))
                    <button id="voucherButton" 
                            class="flex items-center justify-center border hover:border-accent py-1 px-6 rounded-full hover:text-accent hover:bg-transparent text-white bg-accent transition-all duration-500 whitespace-nowrap" 
                            type="button" 
                            onclick="window.location.href='{{ route('myPromoPage') }}'">
                        Voucher Saya
                    </button>
                @endif
            </div>
        </form>

        @include('components.hero_promo')

        <div class="w-full max-w-7xl p-4 border-2 border-gray-800 rounded-lg shadow-md bg-neutral-light">
            <div class="grid grid-cols-2 w-full gap-4">
                @foreach ($coupons as $item)
                    @include('components.customer_coupon_card', ['item' => $item])
                @endforeach
            </div>
        </div>

        <div class="flex items-center gap-2 text-sm mt-4">
            <button class="w-8 h-8 text-gray-500 hover:text-black">&laquo;</button>
            <button class="w-8 h-8 flex items-center justify-center bg-blue-700 text-white rounded">1</button>
            <button class="w-8 h-8 flex items-center justify-center text-blue-700 border border-blue-700 rounded">2</button>
            <button class="w-8 h-8 flex items-center justify-center text-blue-700 border border-blue-700 rounded">3</button>
            <button class="w-8 h-8 text-gray-500 hover:text-black">&raquo;</button>
        </div>
    </div>
</div>

