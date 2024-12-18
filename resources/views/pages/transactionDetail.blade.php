@extends('layouts.master')

@section('content')
<div class="min-h-screen bg-neutral p-24 font-poppins">
  <a href="{{ route('transactionListPage') }}">
    <svg class="w-12 h-12 text-primary" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4"/>
    </svg>      
  </a>
  <h1 class="text-center p-4 font-bold text-3xl text-primary">{{ __('transactionDetail.title') }}</h1>
  <div class="rounded-lg border border-black bg-white h-1/2 px-16 py-10 flex flex-col">
    <div class="flex justify-between items-start">
      <div class="flex items-center gap-10 mb-14">
        <img class="w-[50%] h-[100%]" src="{{ ($transaction->details->first()->product->restaurant->image) ? $transaction->details->first()->product->restaurant->image : asset('img/rest_avatar.png') }}" alt="">
        <span class="text-3xl font-bold">{{ $transaction->details->first()->product->restaurant->name }}</span>
      </div>
      <div class="{{ $transaction->status == 'Unpaid' ? 'text-red-500' : 'text-green-500' }} flex flex-col items-center justify-end w-1/4 rounded-lg p-4 gap-2 }}">
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

    <div class="flex items-center bg-gray-50 p-4 rounded-md shadow-sm">
        <div class="w-1/4 mr-4">
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
    <div class="flex justify-between items-center mt-4 p-4 bg-gray-50 rounded-md shadow-sm">
        <span class="text-sm font-medium text-gray-800">{{ __('transactionDetail.total_price_label') }}</span>
        <span class="text-lg font-bold text-gray-900">Rp {{ number_format($transaction->total_price, 0, ',', '.') }},00</span>
    </div>
  </div>
  <div class="flex justify-center mt-5">
    @auth('customer')
    @if ($transaction->status == 'Unpaid')
    <button id="pay-button" class="bg-tertiary text-white ml-auto py-4 px-8 rounded-xl hover:text-tertiary hover:bg-transparent border hover:border-tertiary transition-all duration-500">
      {{ __('transactionDetail.payment_button') }}
    </button>
    @endif
    @endauth
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
