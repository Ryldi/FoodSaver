@extends('layouts.master')

@section('content')
@auth('customer')
    @include('components.customerPromo')
@endauth
@auth('restaurant')
    @include('components.restaurantPromo')
@endauth
@endsection