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
                        <img src="{{ asset('img/restaurant/store/mcd_store.png') }}" alt="" class="h-60 rounded-xl"/>
                    </li>
                    <li>
                        <img src="{{ asset('img/restaurant/store/jco_store.jpg') }}" alt="" class="h-60 rounded-xl"/>
                    </li>
                    <li>
                        <img src="{{ asset('img/restaurant/store/hokben_store.jpeg') }}" alt="" class="h-60 rounded-xl"/>
                    </li>
                    <li>
                        <img src="{{ asset('img/restaurant/store/breadtalk_store.jpg') }}" alt="" class="h-60 rounded-xl"/>
                    </li>
                    <li>
                        <img src="{{ asset('img/restaurant/store/burgerking_store.jpg') }}" alt="" class="h-60 rounded-xl"/>
                    </li>
                    <li>
                        <img src="{{ asset('img/restaurant/store/dunkin_store.jpg') }}" alt="" class="h-60 rounded-xl"/>
                    </li>
                    <li>
                        <img src="{{ asset('img/restaurant/store/holland_store.png') }}" alt="" class="h-60 rounded-xl"/>
                    </li>
                    <li>
                        <img src="{{ asset('img/restaurant/store/kfc_store.jpeg') }}" alt="" class="h-60 rounded-xl"/>
                    </li>
                </ul>                
            </div>
            <!-- End: Logo Carousel animation -->
            
        </div>

    </div>
</main>