@extends('layouts.master')

@section('content')
<div class="min-h-screen bg-neutral py-28 px-10 font-poppins">
  <a href="{{ (Auth::guard('customer')->check()) ? route('transactionListPage') : route('orderListPage') }}">
    <svg class="w-12 h-12 text-primary" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4"/>
    </svg>
  </a>
  <h1 class="text-center p-4 font-bold text-3xl text-primary">{{ __('transactionDetail.title') }}</h1>
  <div class="rounded-lg border border-black bg-white h-1/2 px-4 md:px-16 py-10 flex flex-col">
    <div class="flex flex-col md:flex-row justify-center md:justify-between items-center md:items-start">
      <div class="flex items-center flex-col md:flex-row gap-10 mb-6 md:mb-14">
        <img class="w-[50%] md:w-[25%] h-[100%]" src="{{ ($transaction->details->first()->product->restaurant->image) ? $transaction->details->first()->product->restaurant->image : asset('img/rest_avatar.png') }}" alt="">
        <span class="text-3xl font-bold">{{ $transaction->details->first()->product->restaurant->name }}</span>
      </div>
      <div class="{{ $transaction->status == 'Unpaid' ? 'text-red-500' : 'text-green-500' }} flex flex-col items-center justify-end md:w-1/4 rounded-lg p-4 gap-2 }}">
        <span class="text-2xl font-bold">{{ __('transactionDetail.status_'.$transaction->status) }}</span>
        @auth('restaurant')
        @if ($transaction->status == 'Paid')
        <form action="{{ route('prepareOrder', ['id' => $transaction->id]) }}" method="POST">
          @csrf
          @method('PUT')
          <button type="submit" class="bg-accent text-white hover:bg-white hover:text-accent border hover:border-accent transition-all duration-500 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">{{ __('transactionDetail.order_button_prepare') }}</button>
        </form>
        @endif
        @if ($transaction->status == 'Prepared')
        <form action="{{ route('completeOrder', ['id' => $transaction->id]) }}" method="POST">
          @csrf
          @method('PUT')
          <button type="submit" class="bg-accent text-white hover:bg-white hover:text-accent border hover:border-accent transition-all duration-500 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">{{ __('transactionDetail.order_button_complete') }}</button>
        </form> 
        @endif
        @endauth
      </div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
      @foreach ($transaction->details as $item)
      <div class="">
          @include('components.product_transaction_card', ['detail' => $item])
      </div>
      @endforeach
    </div>

    <div class="flex items-center gap-2 mt-8 mb-4">
      <svg class="w-[24px] h-[24px] text-accent" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
        <path fill-rule="evenodd" d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z" clip-rule="evenodd"/>
      </svg>
      <h3 class="text-lg font-bold text-gray-800">{{ __('transactionDetail.location_title') }}</h3>
    </div>

    <div class="flex flex-col md:flex-row items-center bg-gray-50 p-4 rounded-md shadow-sm">
        <div class="md:w-1/4 mr-4">
          <iframe
            src="https://maps.google.com/maps?q={{ urlencode($transaction->details->first()->product->restaurant->name) }}+{{ urlencode($transaction->details->first()->product->restaurant->street) }},+Kec.+{{ 
            urlencode($transaction->details->first()->product->restaurant->subdistrict) }},+Kota+{{ 
            urlencode($transaction->details->first()->product->restaurant->city) }},+{{ 
            urlencode($transaction->details->first()->product->restaurant->province) }}+{{ 
            urlencode($transaction->details->first()->product->restaurant->postal_code) }}&t=&z=13&ie=UTF8&iwloc=&output=embed"
            width="100%"
            height="150"
            frameborder="0"
            style="border:0;"
            allowfullscreen=""
            loading="lazy"
            class="rounded-lg">
          </iframe>
        </div>
        <div>
            <p class="font-bold text-gray-800">{{ $transaction->details->first()->product->restaurant->name }}</p>
            <p class="text-sm text-gray-600">{{ $transaction->details->first()->product->restaurant->phone }}</p>
            <p class="text-sm text-gray-600">
              {{ $transaction->details->first()->product->restaurant->street }}<br>
                Kec. {{ $transaction->details->first()->product->restaurant->subdistrict }}, Kota {{ $transaction->details->first()->product->restaurant->city }}, {{ $transaction->details->first()->product->restaurant->province }} {{ $transaction->details->first()->product->restaurant->postal_code }}
            </p>
        </div>
    </div>

    <div class="flex items-center gap-2 mt-6">
      <svg class="w-[24px] h-[24px] text-accent" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
        <path fill-rule="evenodd" d="M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7ZM8 16a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Zm1-5a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Z" clip-rule="evenodd"/>
      </svg>
      <h3 class="text-lg font-bold text-gray-800">{{ __('transactionDetail.order_details_title') }}</h3>
    </div>
    @if ($transaction->coupon_id != null)
    <div class="flex flex-col mt-4 p-4 bg-gray-50 rounded-md shadow-sm">
      <div class="flex flex-col md:flex-row justify-between items-center">
        <span class="text-sm font-medium text-gray-800">{{ __('transactionDetail.total_price_label') }}</span>
        <span class="text-lg text-gray-900">Rp {{ number_format($transaction->total_price, 0, ',', '.') }},00</span>
      </div>
      <div class="flex flex-col md:flex-row justify-between items-center">
        <span class="text-sm font-medium text-gray-800">{{ __('transactionDetail.total_discount_label') }}</span>
        <span class="text-lg text-gray-900">Rp {{ number_format($transaction->discount_price, 0, ',', '.') }},00</span>
      </div>
      <div class="flex flex-col md:flex-row justify-between items-center">
        <span class="text-sm font-medium text-gray-800">{{ __('transactionDetail.total_final_label') }}</span>
        <span class="text-xl font-bold text-gray-900">Rp {{ number_format($transaction->total_price - $transaction->discount_price, 0, ',', '.') }},00</span>
      </div>
    </div>
    @else
    <div class="flex flex-col md:flex-row justify-between items-center mt-4 p-4 bg-gray-50 rounded-md shadow-sm">
      <span class="text-sm font-medium text-gray-800">{{ __('transactionDetail.total_price_label') }}</span>
      <span class="text-lg font-bold text-gray-900">Rp {{ number_format($transaction->total_price, 0, ',', '.') }},00</span>
    </div>
    @endif
  </div>
  <div class="flex justify-center mt-5">
    @auth('customer')
    @if ($transaction->status == 'Unpaid')
    <button id="pay-button" class="bg-tertiary text-white ml-auto py-4 px-8 rounded-xl hover:text-tertiary hover:bg-transparent border hover:border-tertiary transition-all duration-500">
      {{ __('transactionDetail.payment_button') }}
    </button>
    @endif
    @if ($transaction->status == 'Completed')
      <button data-modal-target="review-modal" data-modal-toggle="review-modal" class="bg-accent text-white hover:bg-transparent hover:text-accent border hover:border-accent transition-all duration-500 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">{{ __('transactionDetail.order_button_review') }}</button>
    @endif
    @endauth
  </div>
</div>

<div id="review-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="relative p-4 w-full max-w-md max-h-full">
      <!-- Modal content -->
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
          <!-- Modal header -->
          <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
              <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                  @lang('transactionDetail.order_review_title')
              </h3>
              <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="review-modal">
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                  </svg>
                  <span class="sr-only">Close modal</span>
              </button>
          </div>
          <!-- Modal body -->
          <form class="p-4 md:p-5" method="POST" action="{{ route('reviewOrder', ['id' => $transaction->id]) }}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="grid gap-4 mb-4 grid-cols-2">
                  <div class="col-span-2 justify-center">
                      <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">@lang('transactionDetail.review_image_label')</label>
                      <div class="flex flex-col items-center justify-center">
                          <input class="block text-sm w-[100%] text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file" accept=".png, .jpg, .jpeg" name="image">
                      </div>
                      <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">@lang('editProductModal.image_help')</p>
                  </div>
                  <div class="col-span-2">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                      @lang('transactionDetail.comment_label')
                    </label>
                    <textarea 
                        name="comment" 
                        id="comment" 
                        rows="4" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-accent focus:border-accent block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                        placeholder="@lang('transactionDetail.comment_placeholder')" 
                        required></textarea>
                  </div>
                  <div class="col-span-2">
                      <label for="rating" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">@lang('transactionDetail.rating_label')</label>
                      <input type="number" name="rating" id="rating" min="1" max="5" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required/>
                  </div>
              </div>
              <div class="flex justify-center">
                  <button type="submit" class="text-white w-[100%] inline-flex items-center justify-center bg-accent hover:bg-white hover:text-accent border hover:border-accent transition-all duration-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                      @lang('transactionDetail.save')
                  </button>
              </div>
          </form>
      </div>
  </div>
</div>


<!-- Script -->
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.clientKey') }}"></script>
<script type="text/javascript">
  document.getElementById('pay-button').onclick = function(){
    snap.pay('{{ $transaction->snap_token }}', {
      onSuccess: function(result){
        const successUrl = `{{ route('paymentSuccess', ['id' => ':transaction_id']) }}`.replace(':transaction_id', result.order_id);
        window.location.href = successUrl;
      }
    });
  };
</script>
@endsection
