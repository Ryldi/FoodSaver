@extends('layouts.master')

@section('content')
@auth('customer')
    @include('components.customerPromo' , ['coupons' => $coupons])
@endauth
@auth('restaurant')
    @include('components.restaurantPromo', ['coupons' => $coupons])
@endauth
@endsection