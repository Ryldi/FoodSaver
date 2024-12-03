@extends('layouts.master')

@section('content')

<div class="min-h-screen bg-white pt-20">
    @include('components.toast')
    @auth('customer')
        @include('components.customerProfile')
    @endauth
    @auth('restaurant')
        @include('components.restaurantProfile')
    @endauth
</div>
@endsection