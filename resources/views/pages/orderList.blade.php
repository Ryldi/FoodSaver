@extends('layouts.master')

@section('content')
<div class="relative min-h-screen bg-neutral px-10 py-10">
    <div class="flex flex-col justify-center items-center gap-8 mt-20 mx-28 text-primary">
        <h1 class="text-3xl font-semibold">Daftar Pesanan</h1>
            @foreach ($transactions as $transaction)
                @include('components.order_card', ['transaction' => $transaction])
            @endforeach
    </div>

</div>

@endsection