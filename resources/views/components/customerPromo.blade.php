<div class="min-h-screen bg-neutral px-4 sm:px-6 md:px-10 py-15 pt-24">
  <div class="flex flex-col justify-center items-center gap-6 sm:gap-8 mt-10 sm:mt-20 mx-4 sm:mx-10 lg:mx-28 text-primary">
    <!-- Title -->
    <h1 class="text-2xl sm:text-3xl font-semibold mt-6">Promo</h1>

    <!-- Search Form -->
    <form class="w-full sm:w-full md:w-full mx-auto">
        <div class="flex flex-col sm:flex-row md:flex-row gap-4">
            <!-- Search Input -->
            <div class="relative w-full md:w-full">
                <input type="search" id="search-dropdown" class="block p-3 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border-2 border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Search" required />
                <button type="submit" class="absolute top-0 right-0 p-3 text-sm font-medium h-full text-white bg-blue-700 border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none rounded-r-lg">
                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </button>
            </div>

            <!-- Voucher Button -->
            @if (!request()->routeIs('myPromoPage'))
                <button id="voucherButton" class="flex items-center justify-center border hover:border-accent py-2 px-6 rounded-lg hover:text-accent hover:bg-transparent text-white bg-accent transition-all duration-500 whitespace-nowrap w-auto sm:w-auto md:w-32 mx-auto my-0" type="button" onclick="window.location.href='{{ route('myPromoPage') }}'">
                    Voucher Saya
                </button>
            @endif
        </div>
    </form>

    <!-- Hero Promo -->
    @include('components.hero_promo')

    <div class="w-full max-w-auto p-4 border-2 border-gray-800 rounded-lg shadow-md bg-neutral-light mb-8">
        <div class="grid grid-cols-2 gap-4 md:flex-row md:gap-6">
            @forelse ($coupons as $item)
                @include('components.customer_coupon_card', ['item' => $item])
            @empty
                <div class="text-center text-gray-500 w-full">
                    No promo available
                </div>
            @endforelse
            </div>
        </div>
  </div>
</div>


