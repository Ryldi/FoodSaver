<div class="min-h-screen bg-neutral px-4 sm:px-6 md:px-10 py-15 pt-24">
  <div class="flex flex-col justify-center items-center gap-6 sm:gap-8 mt-10 sm:mt-20 mx-4 sm:mx-10 lg:mx-28 text-primary">
    <!-- Title -->
    <h1 class="text-2xl sm:text-3xl font-semibold mt-10">Promo</h1>

    <!-- Search Form -->
    <form class="w-5/6 sm:w-5/6 md:w-4/6 mx-auto">
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

    <div class="w-full max-w-2xl p-4 border-2 border-gray-800 rounded-lg shadow-md bg-neutral-light">
        <div class="flex flex-col gap-4 md:flex-row md:gap-6">
            @foreach ($coupons as $item)
                @include('components.customer_coupon_card', ['item' => $item])
            @endforeach
        </div>
    </div>

    <!-- Pagination -->
    <div class="flex justify-center items-center gap-2 text-sm mt-4">
      <button class="w-8 h-8 text-gray-500 hover:text-black">&laquo;</button>
      <button class="w-8 h-8 flex items-center justify-center bg-blue-700 text-white rounded">1</button>
      <button class="w-8 h-8 flex items-center justify-center text-blue-700 border border-blue-700 rounded">2</button>
      <button class="w-8 h-8 flex items-center justify-center text-blue-700 border border-blue-700 rounded">3</button>
      <button class="w-8 h-8 text-gray-500 hover:text-black">&raquo;</button>
    </div>
  </div>

  <!-- Modal -->
  <div id="promoModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-lg h-full md:h-auto">
      <div class="relative bg-white rounded-lg shadow">
        <div class="flex justify-between items-center p-4 bg-blue-100 rounded-t-lg">
          <div class="flex items-center gap-4">
            <img src="{{ asset('img/restaurant/logo/Jco.png') }}" alt="" class="h-32 rounded-xl" />
            <p class="text-gray-800 text-sm font-semibold">
              Diskon 70% hingga Rp 50.000 untuk pesan menu lezat pakai kode
              <span class="font-bold">J.CO</span>
            </p>
          </div>
        </div>
        <div class="p-6 bg-blue-50">
          <h3 class="text-red-600 font-semibold text-sm">Syarat dan Ketentuan</h3>
          <ul class="list-disc list-inside text-sm text-gray-700 mt-2">
            <li>Minimum Belanja: Rp. 50.000</li>
            <li>Ketentuan Berlaku: 1x per pelanggan</li>
          </ul>
        </div>
        <div class="flex justify-between items-center p-4 bg-blue-100 rounded-b-lg">
          <p class="text-sm text-gray-500">Berakhir 31/01/2025</p>
          <button data-modal-hide="promoModal" type="button" class="px-4 py-2 bg-red-500 text-white text-sm rounded hover:bg-red-600">
            Tutup
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  function disableClaimButton() {
    const button = document.getElementById('claimButton');
    button.disabled = true;
    button.classList.add('bg-gray-400', 'cursor-not-allowed');
    button.innerText = 'Claimed';
  }
</script>


