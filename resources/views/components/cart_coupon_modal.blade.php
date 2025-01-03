<!-- Main modal -->
<div id="select-modal-{{ $cart['restaurant']->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-lg max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    @lang('cart_coupon_modal.voucher_title')
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="select-modal-{{ $cart['restaurant']->id }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">@lang('cart_coupon_modal_coupon_modal.close_modal')</span>
                </button>
            </div>
            <!-- Modal body -->
            <form method="POST" action="{{ route('selectCoupon') }}" class="p-4 md:p-5">
                @csrf
                <p class="text-gray-500 dark:text-gray-400 mb-4">@lang('cart_coupon_modal.select_voucher')</p>
                <ul class="space-y-4 mb-4 max-h-96 overflow-y-auto">
                    @foreach ($cart['coupons'] as $coupon)
                    <li>
                        <input type="radio" id="coupon-{{ $coupon->id }}" name="coupon" value="{{ $coupon->id }}" class="hidden peer" required />
                        <label for="coupon-{{ $coupon->id }}" class="inline-flex items-center justify-between w-full p-5 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                            <div class="w-full bg-neutral-light border border-black rounded-lg shadow-md">
                                <div class="flex">
                                    <div class="flex flex-col items-center justify-center w-1/4 bg-red-500 text-white rounded-l-lg p-4 gap-2">
                                        <img src="{{ ($cart['restaurant']->image) ? $cart['restaurant']->image : asset('img/rest_avatar.png') }}" class="rounded-full w-auto h-16" alt="">
                                        <div class="text-center">
                                            <h2 class="text-3xl font-extrabold">{{ $coupon->percent }}%</h2>
                                            <p class="text-lg font-semibold">OFF</p>
                                        </div>
                                    </div>
                                    <div class="flex-grow flex flex-col justify-between px-6 py-4 bg-neutral-light border-l border-black">
                                        <div class="flex items-center justify-between p-4 w-full">
                                            <p class="text-sm">
                                                {{ $coupon->desc }}
                                            </p>
                                        </div>
                                        <hr class="border-t-2 border-black w-full my-4" />
                                        <div class="flex justify-between items-center">
                                            <button class="text-sm text-red-600 hover:underline" data-modal-target="promoModal-{{ $coupon->id }}" data-modal-toggle="promoModal-{{ $coupon->id }}">@lang('customer_coupon_card.terms')</button>
                                            <p class="text-sm text-gray-500">@lang('cart_coupon_modal.voucher_end', ['date' => $coupon->end->format('d M Y')])</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </label>
                    </li>
                    {{-- Modal Syarat --}}
<div id="promoModal-{{ $coupon->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-lg h-full md:h-auto">
        <div class="relative bg-white rounded-lg shadow">
            <div class="flex justify-between items-center p-4 bg-blue-100 rounded-t-lg">
                <div class="flex items-center gap-4">
                    @auth('restaurant')
                    <img src="{{ (Auth::guard('restaurant')->user()->image) ? Auth::guard('restaurant')->user()->image : asset('img/rest_avatar.png') }}" alt="" class="rounded-full w-auto h-16"/>
                    <p class="text-gray-800 text-sm font-semibold">
                        Diskon {{ $coupon->percent }}% hingga Rp {{ number_format($coupon->max_disc, 0, ',', '.') }} di {{ Auth::guard('restaurant')->user()->name }}
                    </p>
                    @else
                    <img src="{{ ($coupon->restaurant->image) ? $coupon->restaurant->image : asset('img/rest_avatar.png') }}" class="rounded-full w-auto h-16" alt=""/>
                    <p class="text-gray-800 text-sm font-semibold">
                        Diskon {{ $coupon->percent }}% hingga Rp {{ number_format($coupon->max_disc, 0, ',', '.') }} di {{ $coupon->restaurant->name }}
                    </p>
                    @endauth
                </div>
            </div>
            <div class="p-6 bg-blue-50">
                <h3 class="text-red-600 font-semibold text-sm">@lang('coupon_terms_modal.terms_and_conditions')</h3>
                <ul class="list-disc list-inside text-sm text-gray-700 mt-2">
                    <li>@lang('coupon_terms_modal.min_spend'): Rp. {{ number_format($coupon->min_spend, 0, ',', '.') }}</li>
                    <li>@lang('coupon_terms_modal.applies_once')</li>
                </ul>
            </div>
            <div class="flex justify-between items-center p-4 bg-blue-100 rounded-b-lg">
                <p class="text-sm text-gray-500">@lang('coupon_terms_modal.ends_on') {{ $coupon->end->format('d M Y') }}</p>
                <button data-modal-hide="promoModal-{{ $coupon->id }}" type="button" class="px-4 py-2 bg-red-500 text-white text-sm rounded hover:bg-red-600">
                    @lang('coupon_terms_modal.close')
                </button>
            </div>
        </div>
    </div>
</div>
                    @endforeach
                </ul>
                <button type="submit" class="text-white inline-flex w-full justify-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    @lang('cart_coupon_modal.next_step')
                </button>
            </form>
        </div>
    </div>
</div>


