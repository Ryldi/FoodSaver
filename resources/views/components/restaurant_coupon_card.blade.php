<div class="col-span-2 xl:col-span-1 w-full bg-neutral-light border border-black rounded-lg shadow-md">
    <div class="flex flex-col md:flex-row">
        <div class="flex flex-col items-center justify-center md:w-1/4 bg-red-500 text-white rounded-l-lg p-4 gap-2">
            <img src="{{ (Auth::guard('restaurant')->user()->image) ? Auth::guard('restaurant')->user()->image : asset('img/rest_avatar.png') }}" class="rounded-full w-auto h-16" alt="">

            <div class="text-center">
                <h2 class="text-3xl font-extrabold">
                    @lang('restaurant_coupon_card.discount', ['percent' => $item->percent])
                </h2>
            </div>
        </div>
        <div class="flex-grow flex flex-col justify-between px-6 py-4 bg-neutral-light border-l border-black">
            <div class="flex items-center justify-between p-4 w-full">
                <p class="text-sm">
                    {{ $item->desc }}
                </p>
                <div class="flex flex-col gap-1">
                    <button data-modal-target="delete-product-{{ $item->id }}" data-modal-toggle="delete-product-{{ $item->id }}" data-product-id="" class="bg-red text-white px-2 py-1 rounded-md inline-flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="butt" stroke-linejoin="round" stroke-width="2" d="M19 7H5M9 7V5a2 2 0 012-2h2a2 2 0 012 2v2M4 7h16l-1 14H5L4 7z"></path>
                        </svg>
                        <span class="text-xs">@lang('restaurant_coupon_card.delete')</span>
                    </button>
                    <button data-modal-target="edit-product-{{ $item->id }}" data-modal-toggle="edit-product-{{ $item->id }}" class="bg-accent text-white px-2 py-1 rounded-md inline-flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="butt" stroke-linejoin="round" stroke-width="2" d="M12 20h9M13 5l7 7-5 5-7-7 5-5z"></path>
                        </svg>
                        <span class="text-xs">@lang('restaurant_coupon_card.edit')</span>
                    </button>
                </div>
            </div>
            <hr class="border-t-2 border-black w-full my-4" />
            <div class="flex justify-between items-center">
                <button class="text-sm text-red-600 hover:underline" data-modal-target="promoModal-{{ $item->id }}" data-modal-toggle="promoModal-{{ $item->id }}">
                    @lang('restaurant_coupon_card.terms')
                </button>
                <p class="text-sm text-gray-500">
                    @lang('restaurant_coupon_card.expires_at', ['date' => $item->end->format('d M Y')])
                </p>
            </div>
            @include('components.coupon_modal', ['item' => $item])
        </div>
    </div>
</div>
