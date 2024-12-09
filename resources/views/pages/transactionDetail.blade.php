@extends('layouts.master')

@section('content')
<div class="min-h-screen bg-neutral p-24 font-poppins">
  <a href="{{ route('transactionListPage') }}">
      <svg class="w-12 h-12 text-primary" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4"/>
      </svg>      
  </a>
  <h1 class="text-center p-4 font-bold text-3xl text-primary">Detail Pemesanan</h1>
  <div class="rounded-lg border border-black bg-white h-1/2 px-16 py-10 flex flex-col">
    <div class="flex items-center gap-10 mb-14">
      <img class="w-[15%] h-[15%]" src="{{ ($transaction->details->first()->product->restaurant->image) ? $transaction->details->first()->product->restaurant->image : asset('img/rest_avatar.png') }}" alt="">
      <span class="text-3xl font-bold">{{ $transaction->details->first()->product->restaurant->name }}</span>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
      @foreach ($transaction->details as $item)
      <div class="">
          @include('components.product_transaction_card', ['detail' => $item])
      </div>
      @endforeach
    </div>
    <h2 class="text-xl font-bold text-gray-800 mt-8 mb-4">Pilih Jenis Pemesanan</h2>

    <div class="mb-6">
        <div class="flex items-center mb-2">
            <input id="cod" type="radio" name="payment_method" value="cod" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
            <label for="cod" class="ml-2 text-sm font-medium text-gray-900">Bayar di tempat</label>
        </div>
        <div class="flex items-center">
            <input id="pay_now" type="radio" name="payment_method" value="pay_now" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
            <label for="pay_now" class="ml-2 text-sm font-medium text-gray-900">Bayar sekarang</label>
        </div>
    </div>

    <h3 class="text-lg font-bold text-gray-800 mb-4">Lokasi Penjemputan</h3>
    <div class="flex items-center bg-gray-50 p-4 rounded-md shadow-sm">
        <div class="w-1/4 mr-4">
          <iframe
            src="https://maps.google.com/maps?q={{ urlencode($transaction->details->first()->product->restaurant->name) }}+
            {{ urlencode($transaction->details->first()->product->restaurant->street) }},+Kec.+{{ 
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

    <h3 class="text-lg font-bold text-gray-800 mt-6">Rincian Pemesanan</h3>
    <div class="flex justify-between items-center mt-4 p-4 bg-gray-50 rounded-md shadow-sm">
        <span class="text-sm font-medium text-gray-800">Total Harga Produk</span>
        <span class="text-lg font-bold text-gray-900">Rp {{ number_format($transaction->total_price, 0, ',', '.') }},00</span>
    </div>
  </div>
  <div class="flex justify-center mt-5">
    <button id="pay-button" class="bg-tertiary text-white ml-auto py-4 px-8 rounded-xl hover:text-tertiary hover:bg-transparent border hover:border-tertiary transition-all duration-500">
      Bayar
    </button>
  </div>
</div>
{{-- <div class="mt-40">{{ $transaction->id }}</div> --}}
{{-- <pre><div id="result-json">JSON result will appear here after payment:<br></div></pre>  --}}

<!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.clientKey') }}"></script>
    <script type="text/javascript">
      document.getElementById('pay-button').onclick = function(){
        // SnapToken acquired from previous step
        snap.pay('{{ $transaction->snap_token }}', {
          // Optional
          onSuccess: function(result){
            const successUrl = `{{ route('paymentSuccess', ['id' => ':transaction_id']) }}`.replace(
              ':transaction_id',
              result.order_id
            );

            window.location.href = successUrl;
          },
          // Optional
          onPending: function(result){
            /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          },
          // Optional
          onError: function(result){
            /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          }
        });
      };
    </script>
@endsection