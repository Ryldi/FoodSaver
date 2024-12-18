@extends('layouts.master')

@section('content')
@include('components.hero_carousel')
@include('components.hero_promo')

<div class="">
    <br>
    <p class="text-center text-xl sm:text-2xl font-bold">Populer Minggu ini</p>
    @include('components.rest_carousel')
</div>

<section class="container mx-auto px-4 bg-neutral-light py-10">
<div class="flex flex-col md:flex-row justify-center items-center text-center"> 
        <div class="flex flex-col items-center mb-5 md:mb-0">
            <p class="w-3/4 text-lg sm:text-2xl font-bold text-accent">
                23 - 48 juta ton makanan terbuang sia-sia pertahunnya di Indonesia
            </p>
            <p class="text-sm sm:text-xl font-semibold text-accent my-5">
                Kontribusi besar terbuangnya makanan berasal dari hotel, restoran, katering, supermarket, dan masyarakat yang gemar menyisakan makanannya. 
                <br> & <br> Kerugian ekonomi akibat makanan terbuang
            </p>
            <p class="w-3/4 text-lg sm:text-2xl font-bold text-accent">Rp 213 - 551 triliun/tahun</p>
            <p class="text-xs sm:text-sm text-dark/80 mt-3">Kajian BAPPENAS (2021)</p>
        </div>
        <br>
        <div class="flex justify-center ms-5"> 
            <img src="{{ asset('img/content/terbuang.png') }}" alt="" class="w-2/4">
        </div>
    </div>

    <div class="flex flex-col md:flex-row justify-center items-center my-5">
        <div class="flex justify-center ms-5">
            <img src="{{ asset('img/content/terbuang2.jpeg') }}" alt="" class="w-2/3 rounded-xl">
        </div>
        <br>
        <div class="flex flex-col items-center">
            <p class="w-3/4 text-center text-lg sm:text-2xl font-bold text-accent">
                1,3 miliar ton makanan yang terbuang setiap tahunnya secara global.
            </p>
            <p class="w-3/4 text-center text-sm sm:text-xl font-semibold text-accent my-5">
                Kerugian sebesar Rp107 triliun sampai Rp346 triliun per tahun dari besaran food waste secara global tersebut.
            </p>
            <p class="text-xs sm:text-sm text-dark/80 mt-3 text-center">
                Laporan Food and Agriculture <br> Organization 2023
            </p>
        </div>
    </div>
</section>

<section>
    <div class="flex flex-row justify-center gap-2 my-12">
        <span class="text-xl sm:text-5xl font-bold text-accent italic text-center">SISA Santap</span>
        <span class="text-xl sm:text-5xl text-accent/80 text-center">menjadi solusinya!</span>
    </div>
    <div class="container mx-auto p-8 bg-accent rounded-[80px]">
        <div class="flex flex-wrap justify-center gap-10 py-20 px-12">
            <!-- Card 1 -->
            <div class="relative bg-blue-100 rounded-xl p-6 text-center w-60 mb-8 sm:w-72 shadow-md">
                <img src="{{ asset('img/content/diskon.png') }}" alt="Delivery" class="absolute -top-16 left-1/2 transform -translate-x-1/2 w-24 sm:w-32 h-24 sm:h-32" />
                <h3 class="mt-10 text-sm sm:text-lg font-bold text-black/65">Bayar murah, rasa tetap terjaga</h3>
                <p class="text-gray-600 text-xs sm:text-sm">Semua makanan yang tersisa dan dijual masih layak dan bersih.</p>
            </div>
            <!-- Card 2 -->
            <div class="relative bg-blue-100 rounded-xl p-6 text-center w-60 mb-8 sm:w-72 shadow-md">
                <img src="{{ asset('img/content/delivery.png') }}" alt="Delivery" class="absolute -top-16 left-1/2 transform -translate-x-1/2 w-24 sm:w-32 h-24 sm:h-32" />
                <h3 class="mt-10 text-sm sm:text-lg font-bold text-black/65">Cepat mendapatkan makanan</h3>
                <p class="text-gray-600 text-xs sm:text-sm">Ambil pesanan langsung atau menggunakan jasa delivery yang tersedia.</p>
            </div>
            <!-- Card 3 -->
            <div class="relative bg-blue-100 rounded-xl p-6 text-center w-60 mb-8 sm:w-72 shadow-md">
                <img src="{{ asset('img/content/tangan.png') }}" alt="Environment" class="absolute -top-16 left-1/2 transform -translate-x-1/2 w-24 sm:w-32 h-24 sm:h-32" />
                <h3 class="mt-10 text-sm sm:text-lg font-bold text-black/65">Pemesan makanan yang ramah lingkungan</h3>
                <p class="text-gray-600 text-xs sm:text-sm">Tidak ada makanan yang terbuang akibat SOP toko yang berlaku.</p>
            </div>
        </div>
        
        <div class="flex flex-row justify-center gap-2">
            <span class="text-4xl sm:text-5xl font-bold text-white text-center">DAMPAK</span>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 py-20 px-12">
            <!-- Impact 1 -->
            <div class="text-center">
                <div class="w-32 sm:w-40 h-32 sm:h-40 mx-auto bg-green-100 rounded-full flex items-center justify-center">
                    <img src="{{ asset('img/content/savefood.png') }}" alt="Icon 1" class="w-20 sm:w-32 h-20 sm:h-32" />
                </div>
                <h3 class="mt-4 text-sm sm:text-lg font-semibold text-white">Jumlah makanan berlebih dapat lebih bermanfaat</h3>
            </div>
            <!-- Impact 2 -->
            <div class="text-center">
                <div class="w-32 sm:w-40 h-32 sm:h-40 mx-auto bg-green-100 rounded-full flex items-center justify-center">
                    <img src="{{ asset('img/content/ekonomi.png') }}" alt="Icon 2" class="w-20 sm:w-32 h-20 sm:h-32" />
                </div>
                <h3 class="mt-4 text-sm sm:text-lg font-semibold text-white">Mengurangi besar kehilangan ekonomi akibat makanan yang tersisa</h3>
            </div>
            <!-- Impact 3 -->
            <div class="text-center">
                <div class="w-32 sm:w-40 h-32 sm:h-40 mx-auto bg-green-100 rounded-full flex items-center justify-center">
                    <img src="{{ asset('img/content/recycle.png') }}" alt="Icon 3" class="w-20 sm:w-32 h-20 sm:h-32" />
                </div>
                <h3 class="mt-4 text-sm sm:text-lg font-semibold text-white">Lebih ramah terhadap lingkungan sekitar</h3>
            </div>
        </div>
    </div>
</section>

<div class="my-10">
    <p class="text-3xl sm:text-5xl font-bold text-accent text-center">MITRA KAMI</p>
    @include('components.rest_logo_carousel')
</div>

@endsection
