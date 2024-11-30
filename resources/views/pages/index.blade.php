@extends('layouts.master')

@section('content')
@include('components.hero_carousel')
@auth('restaurant')
    <p>hello restaurant</p>
@endauth
@endsection