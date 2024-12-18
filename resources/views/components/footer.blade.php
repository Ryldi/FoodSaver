<footer class="bg-neutral-light">
    <div class="container flex justify-center items-center p-6 gap-10 md:gap-20">
        <!-- Logo Section -->
        <div class="flex justify-center items-center gap-2 md:gap-6">
            <img src="{{ asset('img/logo.png') }}" alt="logo" class="w-72 sm:w-56 md:w-72">
        </div>

        <!-- Link Section -->
        <div class="flex flex-col gap-2 text-black font-semibold text-sm sm:text-base md:text-lg">
            <a href="{{ route('about-us') }}" class="hover:text-accent-hover transition-all duration-500">Tentang Kami</a>
            <a href="" class="hover:text-accent-hover transition-all duration-500">Produk</a>
            <a href="{{ route('policy') }}" class="hover:text-accent-hover transition-all duration-500">Kebijakan Privasi</a>
            <a href="" class="hover:text-accent-hover transition-all duration-500">Syarat dan Ketentuan</a>
        </div>

        <!-- Social Media Section -->
        <div class="flex flex-col gap-2">
            <span class="text-black font-semibold text-2xl sm:text-xs md:text-2xl text-center">Ikuti Kami</span>
            <div class="flex gap-3 justify-center">
                <a href=""><img src="{{ asset('img/social/facebook.png') }}" alt="" class="w-15 sm:w-20 md:w-20"></a>
                <a href=""><img src="{{ asset('img/social/twitter.png') }}" alt="" class="w-15 sm:w-20 md:w-20"></a>
                <a href=""><img src="{{ asset('img/social/youtube.png') }}" alt="" class="w-15 sm:w-20 md:w-20"></a>
                <a href=""><img src="{{ asset('img/social/instagram.png') }}" alt="" class="w-15 sm:w-20 md:w-20"></a>
                <a href=""><img src="{{ asset('img/social/linkedin.png') }}" alt="" class="w-15 sm:w-20 md:w-20"></a>
            </div>
        </div>
    </div>
</footer>
