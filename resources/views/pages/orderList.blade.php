@extends('layouts.master')

@section('content')
<div class="relative min-h-screen bg-neutral md:px-10 py-16">
    <div class="flex flex-col justify-center items-center gap-8 mt-20 mx-6 text-primary">
        <h1 class="text-3xl font-semibold mx-28">@lang('orderList.title')</h1>
            @foreach ($transactions as $transaction)
                @include('components.order_card', ['transaction' => $transaction])
            @endforeach
            @if (count($transactions) == 0)
            <div class=" bg-white rounded-lg shadow-lg p-4 flex justify-center">
                <h3 class="font-semibold text-lg">@lang('orderList.no_items')</h3>
            </div>
            @endif
    </div>

</div>

@endsection