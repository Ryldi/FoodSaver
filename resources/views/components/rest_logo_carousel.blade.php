<main class="relative flex flex-col justify-center bg-transparent overflow-hidden">
    <div class="w-full mx-auto px-4 md:px-6 py-10">
        <div class="text-center">

            <!-- Logo Carousel animation -->
            <div
                x-data="{}"
                x-init="$nextTick(() => {
                    let ul = $refs.logos;
                    ul.insertAdjacentHTML('afterend', ul.outerHTML);
                    ul.nextSibling.setAttribute('aria-hidden', 'true');
                })"
                class="w-full inline-flex flex-nowrap overflow-hidden [mask-image:_linear-gradient(to_right,transparent_0,_black_128px,_black_calc(100%-128px),transparent_100%)]"
            >
                <ul x-ref="logos" class="flex items-center justify-center md:justify-start [&_li]:mx-8 [&_img]:max-w-none animate-infinite-scroll">
                    <li>
                        <img src="{{ asset('img/restaurant/logo/MCD.png') }}" alt="" class="h-32 rounded-xl"/>
                    </li>
                    <li>
                        <img src="{{ asset('img/restaurant/logo/Hokben.png') }}" alt="" class="h-32 rounded-xl"/>
                    </li>
                    <li>
                        <img src="{{ asset('img/restaurant/logo/Jco.png') }}" alt="" class="h-32 rounded-xl"/>
                    </li>
                    <li>
                        <img src="{{ asset('img/restaurant/logo/Dunkin.png') }}" alt="" class="h-32 rounded-xl"/>
                    </li>
                    <li>
                        <img src="{{ asset('img/restaurant/logo/Holland.png') }}" alt="" class="h-32 rounded-xl"/>
                    </li>
                    <li>
                        <img src="{{ asset('img/restaurant/logo/BurgerKing.png') }}" alt="" class="h-32 rounded-xl"/>
                    </li>
                </ul>                
            </div>
            <!-- End: Logo Carousel animation -->
            
        </div>

    </div>
</main>