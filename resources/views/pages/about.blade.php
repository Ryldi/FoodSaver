@extends('layouts.master')

@section('content')
<div class="bg-neutral text-primary relative mt-16">
     <div class="relative flex flex-col md:flex-row items-center">
        <img src="{{ asset('img/about/tentangkami.jpg') }}" alt="Team" class="w-full md:w-1/2 object-cover relative z-10 mt-18" />
        <div class="flex justify-center items-center mt-8 relative w-full md:w-1/2  z-10">
            <div class="bg-tertiary w-[1100px] h-[1100px] md:w-[70vw] md:h-[70vw] rounded-full shadow-lg absolute -right-[200px] overflow-hidden z-0">
                <div class="absolute top-0 left-0 w-full h-full text-primary p-8 flex items-center justify-center z-10"></div>
            </div>
            <div class="absolute z-10 text-left text-neutral-light p-8">
                <h2 class="text-neutral-light text-3xl font-bold mb-6">@lang('about.about_us')</h2>
                <p class="text-neutral-light leading-relaxed mb-4">
                    @lang('about.description_1')
                </p>
                <p class="text-neutral-light leading-relaxed">
                    @lang('about.description_2')
                </p>
            </div>
        </div>
    </div>

    <div class="relative z-10 bg-skyBlue py-16 mt-23">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-primary text-2xl font-bold mb-12">@lang('about.team')</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8"> <!-- 5 kolom pada layar besar -->
                <div class="flex flex-col items-center">
                    <img src="{{ asset('img/about/ivan.png') }}" alt="Ivan Adrian" class="h-32 w-32 rounded-full" />
                    <h3 class="text-primary mt-4 font-semibold">@lang('about.ivan_adrian')</h3>
                </div>
                <div class="flex flex-col items-center">
                    <img src="{{ asset('img/about/thevid.png') }}" alt="Thevid Oswald" class="h-32 w-32 rounded-full" />
                    <h3 class="text-primary mt-4 font-semibold">@lang('about.thevid_oswald')</h3>
                </div>
                <div class="flex flex-col items-center">
                    <img src="{{ asset('img/about/reynaldi.png') }}" alt="Reynaldi Adidarma" class="h-32 w-32 rounded-full" />
                    <h3 class="text-primary mt-4 font-semibold">@lang('about.reynaldi_adidarma')</h3>
                </div>
                <div class="flex flex-col items-center">
                    <img src="{{ asset('img/about/bernard.png') }}" alt="Bernard Bereness" class="h-32 w-32 rounded-full" />
                    <h3 class="text-primary mt-4 font-semibold">@lang('about.bernard_bereness')</h3>
                </div>
                <div class="flex flex-col items-center">
                    <img src="{{ asset('img/about/dicky.png') }}" alt="Dicky Dharma" class="h-32 w-32 rounded-full" />
                    <h3 class="text-primary mt-4 font-semibold">@lang('about.dicky_dharma')</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
