@extends('layouts.master')

@section('content')
<div class="bg-neutral text-primary relative">
     <div class="relative flex flex-col md:flex-row items-center">
        <img src="{{ asset('img/about/tentangkami.jpg') }}" alt="Team" class="w-full md:w-1/2 object-cover relative z-10 mt-20" />
        <div class="flex justify-center items-center mt-8 relative w-full md:w-1/2  z-10">
            <div class="bg-tertiary w-[1100px] h-[1100px] md:w-[70vw] md:h-[70vw] rounded-full shadow-lg absolute -right-[200px] overflow-hidden z-0">
                <div class="absolute top-0 left-0 w-full h-full text-primary p-8 flex items-center justify-center z-10"></div>
            </div>
            <div class="absolute z-10 text-left text-neutral-light p-8">
                <h2 class="text-neutral-light text-3xl font-bold mb-6">Tentang Kami</h2>
                <p class="text-neutral-light leading-relaxed mb-4">
                    SisaSantap.com, platform inovatif yang berdedikasi untuk mengurangi limbah makanan dan menghadirkan solusi cerdas bagi para pecinta kuliner. Kami percaya bahwa makanan sisa memiliki potensi yang luar biasa dan seharusnya tidak terbuang sia-sia.
                </p>
                <p class="text-neutral-light leading-relaxed">
                    Dengan misi untuk menyediakan makanan berkualitas dengan harga terjangkau, kami berkomitmen untuk menciptakan pengalaman berbelanja yang bermanfaat bagi Anda dan juga lingkungan. Mari bergabung bersama kami untuk menyelamatkan rasa, mengurangi limbah, dan menciptakan masa depan yang lebih baik melalui pilihan makanan yang bijak.
                </p>
            </div>
        </div>
    </div>

    <div class="relative z-10 bg-skyBlue py-16 mt-23">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-primary text-2xl font-bold mb-12">Tim Kami</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8"> <!-- 5 kolom pada layar besar -->
                <div class="flex flex-col items-center">
                    <img src="{{ asset('img/about/ivan.png') }}" alt="Ivan Adrian" class="h-32 w-32 rounded-full" />
                    <h3 class="text-primary mt-4 font-semibold">Ivan Adrian</h3>
                </div>
                <div class="flex flex-col items-center">
                    <img src="{{ asset('img/about/thevid.png') }}" alt="Thevid Oswald" class="h-32 w-32 rounded-full" />
                    <h3 class="text-primary mt-4 font-semibold">Thevid Oswald</h3>
                </div>
                <div class="flex flex-col items-center">
                    <img src="{{ asset('img/about/reynaldi.png') }}" alt="Reynaldi Adidarma" class="h-32 w-32 rounded-full" />
                    <h3 class="text-primary mt-4 font-semibold">Reynaldi Adidarma</h3>
                </div>
                <div class="flex flex-col items-center">
                    <img src="{{ asset('img/about/bernard.png') }}" alt="Bernard Bereness" class="h-32 w-32 rounded-full" />
                    <h3 class="text-primary mt-4 font-semibold">Bernard Bereness</h3>
                </div>
                <div class="flex flex-col items-center">
                    <img src="{{ asset('img/about/dicky.png') }}" alt="Dicky Dharma" class="h-32 w-32 rounded-full" />
                    <h3 class="text-primary mt-4 font-semibold">Dicky Dharma</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    body {
        overflow-x: hidden;
    }
</style>
@endsection
