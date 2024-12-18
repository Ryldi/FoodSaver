<div class="col-span-2 xl:col-span-1 w-full bg-neutral-light border border-black rounded-lg shadow-md flex flex-col md:flex-row">
    <div class="w-full bg-neutral-light border border-black rounded-lg shadow-md flex flex-col md:flex-row">
        <div class="w-auto h-auto">
            <div class="flex flex-col items-center justify-center w-full bg-red-500 text-white rounded-l-lg p-4 gap-2">
                <img src="{{ ($item->restaurant->image) ? $item->restaurant->image : asset('img/rest_avatar.png') }}" class="rounded-full w-auto h-16" alt="">
                <div class="text-center md:ml-4">
                    <h2 class="text-3xl font-extrabold">{{ $item->percent }}%</h2>
                    <p class="text-lg font-semibold">OFF</p>
                </div>
            </div>
        </div>
        
        <div class="flex-grow flex flex-col justify-between px-6 py-4 bg-neutral-light border-l border-black">
            <div class="flex items-center justify-between p-4 w-full">
                <p class="text-sm">
                    {{ $item->desc }}
                </p>
                @if (request()->routeIs('myPromoPage'))
                <div class="flex flex-col gap-1">
                    <form action="{{ route('restaurantDetailPage', ['id' => $item->restaurant->id]) }}" method="GET">
                        @csrf
                        <button class="flex-shrink-0 gap-1 z-10 inline-flex items-center py-1.5 px-6 text-sm font-medium text-center text-neutral-light bg-accent border border-gray-300 rounded-lg focus:ring-4 focus:outline-none hover:bg-accent-hover" type="submit">
                            Use <span class="ml-1">&gt;</span>
                        </button>
                    </form>
                </div>
                @else
                <div class="flex flex-col gap-1">
                    <form action="{{ route('claimCoupon', ['id' => $item->id]) }}" method="POST">
                        @csrf
                        <button class="flex-shrink-0 gap-1 z-10 inline-flex items-center py-1.5 px-6 text-sm font-medium text-center text-neutral-light bg-accent border border-gray-300 rounded-lg focus:ring-4 focus:outline-none hover:bg-accent-hover" type="submit">
                            Claim <span>&gt;</span>
                        </button>
                    </form>
                </div>
                @endif
            </div>
            <hr class="border-t-2 border-black w-full my-4" />
            <div class="flex justify-between items-center">
                <button class="text-sm text-red-600 hover:underline" data-modal-target="promoModal-{{ $item->id }}" data-modal-toggle="promoModal-{{ $item->id }}">Syarat</button>
                <p class="text-sm text-gray-500">Berakhir {{ $item->end->format('d M Y') }}</p>
            </div>
        </div>
    </div>
</div>

@include('components.coupon_terms_modal')
