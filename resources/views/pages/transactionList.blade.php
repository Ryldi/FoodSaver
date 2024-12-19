@extends('layouts.master')

@section('content')
<div class="relative min-h-screen bg-neutral md:px-10 py-16">
    <div class="flex flex-col justify-center items-center gap-8 mt-20 mx-6 text-primary">
        <h1 class="text-3xl font-semibold mx-28">@lang('transactionList.header_order_list')</h1>
        <div class="w-full max-w-4xl p-4 border-2 border-gray-800 rounded-lg shadow-md bg-neutral-light">
            @foreach ($transactions as $item)
            <div class="flex bg-neutral flex-col w-full gap-4 my-3">
                <div class="w-full border border-black rounded-lg shadow-md">
                    <div class="flex flex-col md:flex-row">
                        <div class="flex items-center justify-center md:w-1/4 rounded-l-lg p-4">
                            <img src="{{ ($item->details->first()->product->restaurant->image) ? $item->details->first()->product->restaurant->image : asset('img/rest_avatar.png') }}" class="rounded-full w-32 h-32" alt="">
                        </div>
                        <div class="flex-grow flex flex-col justify-between gap-2 px-6 py-4 ">
                            <div class="flex flex-col w-full">
                                <p class="text-sm text-right text-gray-500">@lang('transactionList.order_id', ['order_id' => $item->id])</p>
                                <h2 class="text-2xl font-bold">@lang('transactionList.restaurant_name', ['restaurant_name' => $item->details->first()->product->restaurant->name])</h2>
                            </div>
                            <hr class="border-t-2 border-black w-full"/>
                            <div class="flex justify-between items-center gap-8 md:gap-0">
                                <p class="text-md {{ $item->status == 'Unpaid' ? 'text-red-600/80' : 'text-green-500/80' }}">
                                    @lang('transactionList.' . strtolower($item->status))
                                </p>
                                <p class="text-sm text-gray-500">@lang('transactionList.created_at'): {{ $item->created_at }}</p>
                            </div>
                            <div class="flex justify-end">
                                <a href="{{ route('transactionPage', ['id' => $item->id]) }}" class="flex items-center justify-center border hover:border-accent py-2 px-6 rounded-lg hover:text-accent hover:bg-transparent text-white bg-accent transition-all duration-500 whitespace-nowrap">
                                    @lang('transactionList.details')
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @if (count($transactions) == 0)
            <div class=" bg-white rounded-lg shadow-lg p-4 flex justify-center">
                <h3 class="font-semibold text-lg">@lang('transactionList.no_items')</h3>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
