@include('components.coupon_terms_modal')

{{-- Modal Delete --}}
<div id="delete-product-{{ $item->id }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="delete-product-{{ $item->id }}">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">@lang('coupon_modal.close_modal')</span>
            </button>
            <form id="deleteProductForm" method="POST" action="{{ route('deletePromo') }}" class="p-4 md:p-5 text-center">
                @csrf
                @method('DELETE')
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">@lang('coupon_modal.delete_product_confirmation')</h3>
                <input type="hidden" name="id" value="{{ $item->id }}">
                <button data-modal-hide="delete-product-{{ $item->id }}" type="submit" class="bg-red hover:bg-white text-white hover:text-red border hover:border-red transition-all duration-500 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                    @lang('coupon_modal.confirm_deletion')
                </button>
                <button data-modal-hide="delete-product-{{ $item->id }}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium rounded-lg bg-accent hover:bg-white text-white hover:text-accent border hover:border-accent transition-all duration-500">@lang('coupon_modal.cancel_deletion')</button>
            </form>
        </div>
    </div>
</div>

{{-- Modal Update --}}
<div id="edit-product-{{ $item->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-xl h-full md:h-auto">
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <div class="flex items-end">
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-primary rounded-lg text-sm p-1.5 ml-auto  dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="edit-product-{{ $item->id }}">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">@lang('coupon_modal.close_modal')</span>
                </button>
            </div>
            <h3 class="text-4xl font-semibold text-center text-primary dark:text-white mb-10">@lang('coupon_modal.update_promo_title')</h3>
            <form action="{{ route('updatePromo', $item->id) }}" method="POST" class="grid grid-cols-2 gap-4">
                @csrf
                @method('PUT')
                <div class="col-span-1">
                    <label for="disc_percentage" class="block mb-2 text-sm font-medium text-primary dark:text-white">@lang('coupon_modal.discount_percentage_label')</label>
                    <div class="flex">
                        <input type="number" name="disc_percentage" id="disc_percentage" value="{{ $item->percent }}" class="bg-gray-50 border border-gray-300 text-primary text-sm rounded-s-md" min="0" max="100" required />
                        <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-s-0 border-gray-300 rounded-e-md">@lang('coupon_modal.discount_percentage_placeholder')</span>
                    </div>
                </div>
                <div class="col-span-1">
                    <label for="date" class="block mb-2 text-sm font-medium text-primary dark:text-white">@lang('coupon_modal.end_date_label')</label>
                    <input type="date" name="date" id="date" value="{{ $item->end->format('Y-m-d') }}" class="bg-gray-50 border border-gray-300 text-primary text-sm rounded-lg focus:ring-primary-600" required>
                </div>
                <div class="col-span-1">
                    <label for="max_disc" class="block mb-2 text-sm font-medium text-primary dark:text-white">@lang('coupon_modal.max_discount_label')</label>
                    <div class="flex">
                        <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md">@lang('coupon_modal.max_discount_placeholder')</span>
                        <input type="number" name="max_disc" id="max_disc" value="{{ $item->max_disc }}" class="bg-gray-50 border border-gray-300 text-primary text-sm rounded-e-md" required />
                    </div>
                </div>
                <div class="col-span-1">
                    <label for="min_spend" class="block mb-2 text-sm font-medium text-primary dark:text-white">@lang('coupon_modal.min_spend_label')</label>
                    <div class="flex">
                        <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md">@lang('coupon_modal.min_spend_placeholder')</span>
                        <input type="number" name="min_spend" id="min_spend" value="{{ $item->min_spend }}" class="bg-gray-50 border border-gray-300 text-primary text-sm rounded-e-md" required />
                    </div>
                </div>
                <div class="col-span-2">
                    <label for="description" class="block mb-2 text-sm font-medium text-primary dark:text-white">@lang('coupon_modal.description_label')</label>
                    <input type="text" name="description" id="description" value="{{ $item->desc }}" class="block p-2.5 w-full text-sm text-primary bg-gray-50 rounded-lg" placeholder="@lang('coupon_modal.description_label')">
                </div>
                <input type="hidden" name="id" value="{{ $item->id }}">
                <button type="submit" class="col-span-2 border py-1 px-6 rounded-lg hover:text-accent hover:bg-transparent text-white bg-accent">@lang('coupon_modal.update_promo_button')</button>
            </form>
        </div>
    </div>
</div>
