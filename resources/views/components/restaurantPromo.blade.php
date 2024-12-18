<div class="min-h-screen bg-neutral px-10 py-10">
    <div class="flex flex-col justify-center items-center gap-4 mt-20 md:mx-28 text-primary">
        <h1 class="text-3xl font-semibold">@lang('restaurantPromo.addPromo')</h1>
        <div class="flex justify-center items-end">
            <button id="defaultModalButton" data-modal-target="defaultModal" data-modal-toggle="defaultModal" class="flex items-center justify-center border hover:border-accent py-1 px-6 rounded-lg hover:text-accent hover:bg-transparent text-white bg-accent transition-all duration-500 whitespace-nowrap" type="button">
                @lang('restaurantPromo.addPromo')
            </button>
        </div>

        <div class="w-full max-w-7xl p-4 border-2 border-gray-800 rounded-lg shadow-md bg-neutral-light">
            <div class="grid grid-cols-2 w-full gap-4">
                @foreach ($coupons as $item)
                    @include('components.restaurant_coupon_card', ['coupon' => $item])
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

    {{-- Modal Tambah --}}
    <div id="defaultModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <div class="flex items-end">
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-primary rounded-lg text-sm p-1.5 ml-auto dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <h3 class="text-4xl font-semibold text-center text-primary dark:text-white mb-10">
                    @lang('restaurantPromo.addPromo')
                </h3>
                <form action="{{ route('addPromo') }}" method="POST" class="grid grid-cols-2 gap-4">
                    @csrf
                    <div class="col-span-1">
                        <label for="disc_percentage" class="block mb-2 text-sm font-medium text-primary dark:text-white">@lang('restaurantPromo.discountPercentage')</label>
                        <div class="flex">
                            <input type="number" name="disc_percentage" id="disc_percentage" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-primary text-sm rounded-s-md focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="50" min="0" max="100" required />
                            <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-s-0 border-gray-300 rounded-e-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                %
                            </span>
                        </div>
                    </div>
                    <div class="col-span-1">
                        <label for="date" class="block mb-2 text-sm font-medium text-primary dark:text-white">@lang('restaurantPromo.expireDate')</label>
                        <input type="date" name="date" id="date" class="bg-gray-50 border border-gray-300 text-primary text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                    </div>
                    <div class="col-span-1">
                        <label for="max_disc" class="block mb-2 text-sm font-medium text-primary dark:text-white">@lang('restaurantPromo.maxDiscount')</label>
                        <div class="flex">
                            <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                Rp
                            </span>
                            <input type="number" name="max_disc" id="max_disc" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-primary text-sm rounded-e-md focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="20000" min="0" max="1000000" required />
                        </div>
                    </div>
                    <div class="col-span-1">
                        <label for="min_spend" class="block mb-2 text-sm font-medium text-primary dark:text-white">@lang('restaurantPromo.minPurchase')</label>
                        <div class="flex">
                            <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                Rp
                            </span>
                            <input type="number" name="min_spend" id="min_spend" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-primary text-sm rounded-e-md focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="50000" min="0" max="1000000" required />
                        </div>
                    </div>
                    <div class="col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-primary dark:text-white">@lang('restaurantPromo.description')</label>
                        <input type="text" name="description" id="description" class="block p-2.5 w-full text-sm text-primary bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="@lang('restaurantPromo.description')"></input>                    
                    </div>
                    <div class="col-span-2">
                        <div class="flex justify-center">
                            <button type="submit" class="flex items-center justify-center border hover:border-accent py-1 px-6 rounded-lg hover:text-accent hover:bg-transparent text-white bg-accent transition-all duration-500 whitespace-nowrap">
                                @lang('restaurantPromo.submitPromo')
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
