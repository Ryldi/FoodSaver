<navbar class="flex justify-center bg-neutral-light border-b border-accent fixed w-full z-40 top-0 shadow-lg py-2">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between p-4">
        <a class="flex items-center space-x-3 rtl:space-x-reverse gap-2" href="{{ route('indexPage') }}">
            <img src="{{ asset('img/logo.png') }}" alt="" class="w-40 h-auto">
        </a>
        <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <div class="flex flex-col md:flex-row">
                <div class="md:flex md:gap-8 font-medium flex flex-col p-4 md:p-0 mt-4 border rounded-lg md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0">
                    <ul class="flex flex-col md:flex-row md:gap-4">
                        <a href="{{ route('indexPage') }}" class="flex items-center justify-center py-1 px-4 md:px-6 rounded-full hover:text-accent transition-all duration-500 {{ request()->routeIs('indexPage') ? 'text-accent' : '' }} " aria-current="page">
                        Home
                        </a>
                        <div class="flex items-center justify-center py-1 px-4 md:px-6 rounded-full hover:text-accent transition-all duration-500 {{ request()->routeIs('profile.view') ? 'text-accent' : '' }}">
                            @auth('restaurant')
                            <a href="{{ route('manageProductPage') }}" class="flex items-center py-1 rounded-full hover:text-accent transition-all duration-500 {{ request()->routeIs('manageProductPage') ? 'text-accent' : '' }}">My Product</a>
                            @elseif(auth('customer')->check())
                            <a href="{{ route('restaurantPage') }}" class="flex items-center py-1 px-4 rounded-full hover:text-accent transition-all duration-500 {{ request()->routeIs('restaurantPage') ? 'bg-accent-selected' : '' }}">
                                Restaurant
                            </a>
                            @endauth
                        </div>
                        <a href="{{ route('promoPage') }}" class="flex items-center justify-center py-1 px-4 md:px-6 rounded-full hover:text-accent transition-all duration-500 {{ request()->routeIs('promoPage') ? 'bg-accent-selected' : '' }}">
                            Promo
                        </a>
                        @auth('customer')
                        <a href="{{ route('transactionListPage') }}" class="flex items-center justify-center py-1 px-4 md:px-6 rounded-full hover:text-accent transition-all duration-500 {{ request()->routeIs('transactionListPage') ? 'text-accent' : '' }}">
                            Riwayat Pesanan
                        </a>
                        @endauth
                        @auth('restaurant')
                        <a href="{{ route('orderListPage') }}" class="flex items-center justify-center py-1 px-4 md:px-6 rounded-full hover:text-accent transition-all duration-500 {{ request()->routeIs('orderListPage') ? 'text-accent' : '' }}">
                            Pesanan Masuk
                        </a>
                        @endauth
                    </ul>
                </div>
                <div class="flex flex-row justify-evenly gap-8">
                    @auth('customer')
                        <div class="relative group flex items-center py-1 px-4 md:px-6 rounded-full transition-all duration-500 hover:text-accent">
                            <button id="notificationButtonCustomer" data-dropdown-toggle="notificationDropdownCustomer" class="relative flex items-center focus:outline-none">
                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9Z" />
                                <path d="M13.73 21a2 2 0 0 1-3.46 0" />
                                </svg>
                                <span class="absolute top-0 right-0 block w-2.5 h-2.5 transform translate-x-1/2 -translate-y-1/2 bg-red-500 rounded-full border border-white"></span>
                            </button>
                            <div id="notificationDropdownCustomer" class="hidden absolute right-0 z-50 mt-2 w-80 bg-white divide-y divide-gray-100 rounded-lg shadow-lg">
                                <div class="py-2 px-4 bg-gray-100 border-b">
                                <span class="font-semibold text-gray-700">Notifikasi</span>
                                </div>
                                <div class="p-2 space-y-2">
                                <a href="/order-details" class="flex items-start p-2 bg-gray-50 hover:bg-gray-100 rounded-lg">
                                    <img src="{{ asset('img/restaurant/logo/Jco.png') }}" alt="Logo" class="w-10 h-10 rounded-full">
                                    <div class="ml-3 text-sm">
                                    <p class="font-medium text-gray-700">Pesanan Anda telah diterima oleh J.CO</p>
                                    <p class="text-gray-500 text-xs">03 Desember 2024 - 21:30 PM</p>
                                    </div>
                                </a>
                                <a href="/order-details" class="flex items-start p-2 bg-gray-50 hover:bg-gray-100 rounded-lg">
                                    <img src="{{ asset('img/restaurant/logo/Jco.png') }}" alt="Logo" class="w-10 h-10 rounded-full">
                                    <div class="ml-3 text-sm">
                                    <p class="font-medium text-gray-700">Pesanan anda telah diterima oleh J.CO, klik untuk melihat detail pesanan</p>
                                    <p class="text-gray-500 text-xs">03 Desember 2024 - 21:00 PM</p>
                                    </div>
                                </a>
                                </div>
                            </div>
                        </div>
                    @endauth
        
                    @auth('restaurant')
                        <div class="relative group flex items-center py-1 px-4 md:px-6 rounded-full transition-all duration-500 hover:text-accent">
                            <button id="notificationButtonRestaurant" data-dropdown-toggle="notificationDropdownRestaurant" class="relative flex items-center focus:outline-none">
                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9Z" />
                                <path d="M13.73 21a2 2 0 0 1-3.46 0" />
                                </svg>
                                <span class="absolute top-0 right-0 block w-2.5 h-2.5 transform translate-x-1/2 -translate-y-1/2 bg-red-500 rounded-full border border-white"></span>
                            </button>
        
                            <div id="notificationDropdownRestaurant" class="hidden absolute right-0 z-50 mt-2 w-80 bg-white divide-y divide-gray-100 rounded-lg shadow-lg">
                                <div class="py-2 px-4 bg-gray-100 border-b">
                                    <span class="font-semibold text-gray-700">Notifikasi</span>
                                </div>
                                <div class="p-2 space-y-2">
                                    <a href="/restaurant-orders" class="flex items-start p-2 bg-gray-50 hover:bg-gray-100 rounded-lg">
                                        <img src="{{ asset('img/about/bernard.png') }}" alt="Logo" class="w-10 h-10 rounded-full">
                                        <div class="ml-3 text-sm">
                                            <p class="font-medium text-gray-700">Pesanan masuk dari Bernard Bereness, klik untuk melihat detail pesanan</p>
                                            <p class="text-gray-500 text-xs">03 Desember 2024 - 21:30 PM</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2 space-y-2">
                                    <a href="/restaurant-orders" class="flex items-start p-2 bg-gray-50 hover:bg-gray-100 rounded-lg">
                                        <img src="{{ asset('img/about/bernard.png') }}" alt="Logo" class="w-10 h-10 rounded-full">
                                        <div class="ml-3 text-sm">
                                            <p class="font-medium text-gray-700">Pesanan masuk dari Bernard Bereness, klik untuk melihat detail pesanan</p>
                                            <p class="text-gray-500 text-xs">03 Desember 2024 - 21:00 PM</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endauth
        
                    <div class="flex items-center py-1 px-4 md:px-6 rounded-full hover:text-accent transition-all duration-500 {{ request()->routeIs('profile.view') ? 'bg-accent-selected' : '' }}">
                        <button id="dropdownHoverButton" data-dropdown-toggle="dropdownLanguage" data-dropdown-trigger="hover" type="button" class="flex items-center justify-between">
                            <div class="gap-1 flex items-center">
                                <svg class="w-5 h-5 ms-2.5" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10" />
                                    <line x1="2" y1="12" x2="22" y2="12" />
                                    <path d="M12 2a15.3 15.3 0 0 1 0 20a15.3 15.3 0 0 1 0-20" />
                                </svg>
                                <span>{{ session()->get('locale') }}</span>
                            </div>
                            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                        </button>
                    </div>
                    <div id="dropdownLanguage" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverButton">
                            <li>
                                <a href="{{ route('setLanguage', 'id') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white {{ (session()->get('locale') == 'id') ? 'text-accent bg-gray-100 dark:bg-gray-600' : '' }}">Indonesia</a>
                            </li>
                            <li>
                                <a href="{{ route('setLanguage', 'en') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white {{ (session()->get('locale') == 'en') ? 'text-accent bg-gray-100 dark:bg-gray-600' : '' }}">English</a>
                            </li>
                        </ul>
                    </div>
                    @auth('customer')
                    <div class="flex items-center py-1 px-4 md:px-6 rounded-full hover:text-accent transition-all duration-500">
                        <button id="dropdownHoverButton" data-dropdown-toggle="dropdownProfile" data-dropdown-trigger="hover" type="button" class="flex items-center justify-between gap-3">
                        <img src="{{ (Auth::guard('customer')->user()->image) ? Auth::guard('customer')->user()->image : asset('img/avatar.png') }}" alt="" class="w-10 h-10 rounded-full">
                        <span class="text-lg">{{ Auth::guard('customer')->user()->name }}</span>
                        </button>
                    </div>
                    <div id="dropdownProfile" class="z-40 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverButton">
                        <li>
                            <a href="{{ route('profilePage') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profile</a>
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST" class="block">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Logout</button>
                            </form>
                        </li>
                        </ul>
                    </div>
                    @endauth
                    @auth('restaurant')
                    <div class="flex items-center py-1 px-4 md:px-6 rounded-full hover:text-accent transition-all duration-500">
                        <button id="dropdownHoverButton" data-dropdown-toggle="dropdownProfile" data-dropdown-trigger="hover" type="button" class="flex items-center justify-between gap-3">
                        <img src="{{ (Auth::guard('restaurant')->user()->image) ? Auth::guard('restaurant')->user()->image : asset('img/rest_avatar.png') }}" alt="" class="w-10 h-10 rounded-full">
                        <span class="text-lg">{{ Auth::guard('restaurant')->user()->name }}</span>
                        </button>
                    </div>
                    <div id="dropdownProfile" class="z-40 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverButton">
                        <li>
                            <a href="{{ route('profilePage') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profile</a>
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST" class="block">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Logout</button>
                            </form>
                        </li>
                    </ul>
                    </div>
                    @endauth
                    @guest('restaurant')
                    @guest('customer')
                    <ul class="flex gap-2 md:gap-4">
                        <li class="border hover:border-accent py-1 px-6 rounded-full hover:text-accent hover:bg-transparent text-white bg-accent transition-all duration-500">
                            <a href="{{ route('loginPage') }}">Masuk</a>
                        </li>
                        <li class="border hover:border-accent py-1 px-6 rounded-full hover:text-accent hover:bg-transparent text-white bg-accent transition-all duration-500">
                            <a href="{{ route('registerPage') }}">Daftar Sekarang</a>
                        </li>
                    </ul>
                    @endguest
                    @endguest
                </div>
            </div>
        </div>
    </div>
</navbar>


