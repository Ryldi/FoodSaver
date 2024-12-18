{{-- Modal Syarat --}}
<div id="promoModal-{{ $item->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-lg h-full md:h-auto">
        <div class="relative bg-white rounded-lg shadow">
            <div class="flex justify-between items-center p-4 bg-blue-100 rounded-t-lg">
                <div class="flex items-center gap-4">
                    @auth('restaurant')
                    <img src="{{ (Auth::guard('restaurant')->user()->image) ? Auth::guard('restaurant')->user()->image : asset('img/rest_avatar.png') }}" alt="" class="rounded-full w-auto h-16"/>
                    <p class="text-gray-800 text-sm font-semibold">
                        Diskon {{ $item->percent }}% hingga Rp {{ number_format($item->max_disc, 0, ',', '.') }} di {{ Auth::guard('restaurant')->user()->name }}
                    </p>
                    @else
                    <img src="{{ ($item->restaurant->image) ? $item->restaurant->image : asset('img/rest_avatar.png') }}" class="rounded-full w-auto h-16" alt=""/>
                    <p class="text-gray-800 text-sm font-semibold">
                        Diskon {{ $item->percent }}% hingga Rp {{ number_format($item->max_disc, 0, ',', '.') }} di {{ $item->restaurant->name }}
                    </p>
                    @endauth
                </div>
            </div>
            <div class="p-6 bg-blue-50">
                <h3 class="text-red-600 font-semibold text-sm">@lang('coupon_terms_modal.terms_and_conditions')</h3>
                <ul class="list-disc list-inside text-sm text-gray-700 mt-2">
                    <li>@lang('coupon_terms_modal.min_spend'): Rp. {{ number_format($item->min_spend, 0, ',', '.') }}</li>
                    <li>@lang('coupon_terms_modal.applies_once')</li>
                </ul>
            </div>
            <div class="flex justify-between items-center p-4 bg-blue-100 rounded-b-lg">
                <p class="text-sm text-gray-500">@lang('coupon_terms_modal.ends_on') {{ $item->end->format('d M Y') }}</p>
                <button data-modal-hide="promoModal-{{ $item->id }}" type="button" class="px-4 py-2 bg-red-500 text-white text-sm rounded hover:bg-red-600">
                    @lang('coupon_terms_modal.close')
                </button>
            </div>
        </div>
    </div>
</div>
