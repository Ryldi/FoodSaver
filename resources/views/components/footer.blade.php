<footer class="bg-neutral-light">
    <div class="container flex justify-center items-center p-6 gap-10 md:gap-20">
        <div class="flex justify-center items-center gap-2 md:gap-6">
            <img src="{{ asset('img/logo.png') }}" alt="logo" class="w-72">
        </div>
        <div class="flex flex-col gap-2 text-black font-semibold">
            <a href="{{ route('about-us') }}" class="hover:text-accent-hover transition-all duration-500">Tentang Kami</a>
            <a href="" class="hover:text-accent-hover transition-all duration-500">Product</a>
            <a href="{{ route('policy') }}" class="hover:text-accent-hover transition-all duration-500">Kebijakan Privasi</a>
            <a href="" class="hover:text-accent-hover transition-all duration-500">Syarat dan Ketentuan</a>
        </div>
        <div class="flex flex-col gap-2">
            <span class="text-black font-semibold text-2xl text-center">Follow Us</span>
            <div class="flex gap-3 justify-content-center">
                <a href=""><img src="{{ asset('img/social/facebook.png') }}" alt="" width="30"></a>
                <a href=""><img src="{{ asset('img/social/twitter.png') }}" alt="" width="30"></a>
                <a href=""><img src="{{ asset('img/social/youtube.png')  }}" alt="" width="30"></a>
                <a href=""><img src="{{ asset('img/social/instagram.png') }}" alt="" width="30"></a>
                <a href=""><img src="{{ asset('img/social/linkedin.png') }}" alt="" width="30"></a>
            </div>
        </div>
    </div>
</footer>