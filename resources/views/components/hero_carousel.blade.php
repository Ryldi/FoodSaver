<div id="default-carousel" class="relative w-full mt-24 md:mt-10 lg:mt-16 xl:mt-20" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative h-96 overflow-hidden">
        <div class="flex transition-transform duration-700 ease-in-out" id="carousel-items">
            <!-- Item 1 -->
            <div class="flex gap-4 w-full" data-carousel-item>
                <div class="relative w-full flex justify-center items-center py-40 px-10" style="background-image: url('{{ asset('img/hero_carousel/1.jpg') }}'); background-size: cover; background-position: center;">
                    <div class="absolute inset-0 bg-black/60"></div>
                    <div class="relative z-[1] text-white">
                        <h1 class="text-2xl sm:text-2xl md:text-3xl font-bold w-[80%]">Sisa Tak Terbuang, Rasa Tetap Terjaga</h1>
                        <p class="text-sm sm:text-sm md:text-md my-3 w-[60%]">Selamatkan makanan berlebih dari toko makanan dengan harga selalu diskon 50% tanpa syarat!</p>
                        <a type="button" class="text-white text-sm md:text-base bg-accent hover:bg-accent-hover rounded-full px-4 py-1 text-center me-2 mb-2 cursor-pointer">Lihat Makanan</a>
                    </div>
                    <div class="z-[1]">
                        <img src="{{ asset('img/hero_carousel/hand.png') }}" alt="" width="250">
                    </div>
                </div>
            </div>
            <!-- Item 2 -->
            <div class="flex gap-4 w-full" data-carousel-item>
                <div class="relative w-full flex justify-center items-center py-40 px-10" style="background-image: url('{{ asset('img/hero_carousel/2.jpg') }}'); background-size: cover; background-position: center;">
                    <div class="absolute inset-0 bg-black/60"></div>
                    <div class="relative z-[1] text-white">
                        <h1 class="text-2xl sm:text-2xl md:text-3xl font-bold w-[80%]">Sisa Tak Terbuang, Rasa Tetap Terjaga</h1>
                        <p class="text-sm sm:text-sm md:text-md my-3 w-[60%]">Selamatkan makanan berlebih dari toko makanan dengan harga selalu diskon 50% tanpa syarat!</p>
                        <a type="button" class="text-white text-sm md:text-base bg-accent hover:bg-accent-hover rounded-full px-4 py-1 text-center me-2 mb-2 cursor-pointer">Lihat Makanan</a>
                    </div>
                    <div class="z-[1]">
                        <img src="{{ asset('img/hero_carousel/hand.png') }}" alt="" width="250">
                    </div>
                </div>
            </div>
            <!-- Item 3 -->
            <div class="flex gap-4 w-full" data-carousel-item>
                <div class="relative w-full flex justify-center items-center py-40 px-10" style="background-image: url('{{ asset('img/hero_carousel/3.jpg') }}'); background-size: cover; background-position: center;">
                    <div class="absolute inset-0 bg-black/60"></div>
                    <div class="relative z-[1] text-white">
                        <h1 class="text-2xl sm:text-3xl md:text-5xl lg:text-6xl xl:text-7xl font-bold w-[80%]">Sisa Tak Terbuang, Rasa Tetap Terjaga</h1>
                        <p class="text-sm sm:text-sm md:text-md my-3 w-[60%]">Selamatkan makanan berlebih dari toko makanan dengan harga selalu diskon 50% tanpa syarat!</p>
                        <a type="button" class="text-white text-sm md:text-base bg-accent hover:bg-accent-hover rounded-full px-4 py-1 text-center me-2 mb-2 cursor-pointer">Lihat Makanan</a>
                    </div>
                    <div class="z-[1]">
                        <img src="{{ asset('img/hero_carousel/hand.png') }}" alt="" width="250">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
        <button type="button" class="w-3 h-3 rounded-full border-2 hover:bg-accent-hover" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
        <button type="button" class="w-3 h-3 rounded-full border-2 hover:bg-accent-hover" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
        <button type="button" class="w-3 h-3 rounded-full border-2 hover:bg-accent-hover" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
    </div>
</div>
