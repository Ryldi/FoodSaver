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

        <div class="w-full max-w-2xl p-4 border-2 border-gray-800 rounded-lg shadow-md bg-neutral-light">
            <div class="flex flex-col w-full gap-4">
                <div class="w-full bg-neutral-light border border-black rounded-lg shadow-md">
                    <div class="flex">
                        <div class="flex items-center justify-center w-1/4 bg-red-500 text-white rounded-l-lg p-4">
                            <div class="text-center">
                                <h2 class="text-3xl font-extrabold">90%</h2>
                                <p class="text-lg font-semibold">OFF</p>
                            </div>
                        </div>
                        <div class="flex-grow flex flex-col justify-between px-6 py-4 bg-neutral-light border-l border-black">
                            <div class="flex items-center justify-between p-4 w-full">
                                <p class="text-sm">
                                    Diskon 90% hingga Rp 20.000 untuk pesan menu lezat pakai kode
                                    <span class="font-bold">J.CO</span>
                                </p>
                                @if (!request()->routeIs('myPromoPage'))
                                    <button id="claimButton" 
                                            class="flex-shrink-0 gap-1 z-10 inline-flex items-center py-1.5 px-6 text-sm font-medium text-center text-neutral-light bg-accent border border-gray-300 rounded-lg focus:ring-4 focus:outline-none hover:bg-accent-hover" 
                                            type="button" 
                                            onclick="disableClaimButton()">
                                        Claim &gt;
                                    </button>
                                @endif
                            </div>
                            <hr class="border-t-2 border-black w-full my-4" />
                            <div class="flex justify-between items-center">
                                <a href="#" class="text-sm text-red-600 hover:underline" data-modal-target="promoModal" data-modal-toggle="promoModal">Syarat</a>
                                <p class="text-sm text-gray-500">Berakhir 31/01/2025</p>
                            </div>
                        </div>
                    </div>
                </div>
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

   <!-- Modal -->
   <div id="promoModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-lg h-full md:h-auto">
            <div class="relative bg-white rounded-lg shadow">
                <div class="flex justify-between items-center p-4 bg-blue-100 rounded-t-lg">
                    <div class="flex items-center gap-4">
                        <img src="{{ asset('img/restaurant/logo/Jco.png') }}" alt="" class="h-32 rounded-xl"/>
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
