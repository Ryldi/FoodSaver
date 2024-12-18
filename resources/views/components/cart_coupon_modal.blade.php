<!-- Main modal -->
<div id="select-modal-{{ $cart['restaurant']->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
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
            <div class="p-4 md:p-5">
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
                                            <div class="flex flex-col gap-1">
                                                <form action="" method="">
                                                    @csrf
                                                    <button class="flex-shrink-0 gap-1 z-10 inline-flex items-center py-1.5 px-2 text-sm font-medium text-center text-neutral-light bg-accent border border-gray-300 rounded-lg focus:ring-4 focus:outline-none hover:bg-accent-hover" type="submit">
                                                        @lang('cart_coupon_modal.use')
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                        <hr class="border-t-2 border-black w-full my-4" />
                                        <div class="flex justify-end items-center">
                                            <p class="text-sm text-gray-500">@lang('cart_coupon_modal.voucher_end', ['date' => $coupon->end->format('d M Y')])</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </label>
                    </li>
                    @endforeach
                </ul>
                <button class="text-white inline-flex w-full justify-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    @lang('cart_coupon_modal.next_step')
                </button>
            </div>
        </div>
    </div>
</div>
