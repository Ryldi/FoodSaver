<navbar class="md:flex md:justify-evenly bg-neutral-light border-b border-accent fixed w-full z-40 top-0 shadow-lg py-2">
    <div class="max-w-screen-3xl flex flex-wrap items-center justify-between p-4">
        <a class="flex items-center space-x-3 rtl:space-x-reverse gap-2" href="{{ route('indexPage') }}">
            <img src="{{ asset('img/logo.png') }}" alt="" class="w-40 h-auto md:mx-16">
        </a>
        <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <div class="flex flex-col md:flex-row gap-8">
                <div class="md:flex md:gap-8 font-medium flex flex-col p-4 md:p-0 mt-4 border rounded-lg md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0">
                    <ul class="flex flex-col md:flex-row md:gap-4 justify-evenly">
                        <a href="{{ route('indexPage') }}" class="flex items-center justify-center py-1 px-4 md:px-2 rounded-full hover:text-accent transition-all duration-500 {{ request()->routeIs('indexPage') ? 'text-accent' : '' }} " aria-current="page">
                            @lang('navbar.nav_home')
                        </a>
                        <div class="flex items-center justify-center py-1 md:px-1 rounded-full hover:text-accent transition-all duration-500 {{ request()->routeIs('profile.view') ? 'text-accent' : '' }}">
                            @auth('restaurant')
                            <a href="{{ route('manageProductPage') }}" class="flex items-center py-1 px-2 rounded-full hover:text-accent transition-all duration-500 {{ request()->routeIs('manageProductPage') ? 'text-accent' : '' }}">@lang('navbar.nav_product')</a>
                            @elseif(auth('customer')->check())
                            <a href="{{ route('restaurantPage') }}" class="flex items-center py-1 px-2 rounded-full hover:text-accent transition-all duration-500 {{ request()->routeIs('restaurantPage') ? 'bg-accent-selected' : '' }}">
                                @lang('navbar.nav_restaurant')
                            </a>
                            @else
                            <a href="{{ route('restaurantPage') }}" class="flex items-center py-1 px-2 rounded-full hover:text-accent transition-all duration-500 {{ request()->routeIs('restaurantPage') ? 'bg-accent-selected' : '' }}">
                                @lang('navbar.nav_restaurant')
                            </a>
                            @endauth
                        </div>
                        @auth('customer')
                        <a href="{{ route('promoPage') }}" class="flex items-center justify-center py-1 px-4 md:px-2 rounded-full hover:text-accent transition-all duration-500 {{ request()->routeIs('promoPage') ? 'bg-accent-selected' : '' }}">
                            @lang('navbar.nav_promo')
                        </a>
                        @endauth
                        @auth('restaurant')
                        <a href="{{ route('promoPage') }}" class="flex items-center justify-center py-1 px-4 md:px-2 rounded-full hover:text-accent transition-all duration-500 {{ request()->routeIs('promoPage') ? 'bg-accent-selected' : '' }}">
                            @lang('navbar.nav_promo')
                        </a>
                        @endauth
                        @auth('customer')
                        <a href="{{ route('transactionListPage') }}" class="flex items-center justify-center py-1 px-4 md:px-2 rounded-full hover:text-accent transition-all duration-500 {{ request()->routeIs('transactionListPage') ? 'text-accent' : '' }}">
                            @lang('navbar.nav_order')
                        </a>
                        @endauth
                        @auth('restaurant')
                        <a href="{{ route('orderListPage') }}" class="flex items-center justify-center py-1 px-4 md:px-2 rounded-full hover:text-accent transition-all duration-500 {{ request()->routeIs('orderListPage') ? 'text-accent' : '' }}">
                            @lang('navbar.nav_inOrder')
                        </a>
                        @endauth
                    </ul>
                </div>
                <div class="flex flex-row justify-evenly pt-4 md:pt-0 gap-8 md:gap-4">
                    @auth('customer')
                        <div class="relative group flex items-center py-1 px-4 md:px-2 rounded-full transition-all duration-500 hover:text-accent">
                            <button id="dropdownHoverButton" data-dropdown-toggle="notificationDropdownCustomer" data-dropdown-trigger="hover" class="relative flex items-center focus:outline-none">
                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9Z" />
                                <path d="M13.73 21a2 2 0 0 1-3.46 0" />
                                </svg>
                            </button>
                            <div id="notificationDropdownCustomer" class="hidden absolute right-0 z-50 mt-2 w-80 bg-white divide-y divide-gray-100 rounded-lg shadow-lg">
                                <div class="py-2 px-4 bg-gray-100 border-b">
                                <span class="font-semibold text-gray-700">Notifikasi</span>
                                </div>
                                <div class="p-2 space-y-2 overflow-y-auto max-h-[250px]">
                                @if(session('notifications') !== null)
                                    @if (session('notifications')->count() > 0)
                                    @foreach (session('notifications') as $notif)
                                        @if ($notif['status'] === 'prepare_order')
                                        <a href="/transaction/{{ $notif['transaction_id'] }}" class="flex items-start p-2 bg-gray-50 hover:bg-gray-100 rounded-lg">
                                            <div class="ml-3 text-sm">
                                            <p class="font-medium text-gray-700">Pesanan anda telah disiapkan oleh {{ $notif['restaurant_name'] }}, klik untuk melihat detail pesanan</p>
                                            <p class="text-gray-500 text-xs">{{ $notif['created_at']->diffForHumans() }}</p>
                                            </div>
                                        </a>
                                        @elseif ($notif['status'] === 'complete_order')
                                        <a href="/transaction/{{ $notif['transaction_id'] }}" class="flex items-start p-2 bg-gray-50 hover:bg-gray-100 rounded-lg">
                                            <div class="ml-3 text-sm">
                                            <p class="font-medium text-gray-700">Pesanan anda telah diselesaikan oleh {{ $notif['restaurant_name'] }}, klik untuk melihat detail</p>
                                            <p class="text-gray-500 text-xs">{{ $notif['created_at']->diffForHumans() }}</p>
                                            </div>
                                        </a>
                                        @endif
                                    @endforeach
                                    @else
                                    <p class="text-sm text-gray-500 text-center">Tidak ada notifikasi</p>
                                    @endif
                                @endif
                                </div>
                            </div>
                        </div>
                    @endauth
        
                    @auth('restaurant')
                        <div class="relative group flex items-center py-1 px-4 md:px-2 rounded-full transition-all duration-500 hover:text-accent">
                            <button id="dropdownHoverButton" data-dropdown-toggle="notificationDropdownRestaurant" data-dropdown-trigger="hover" class="relative flex items-center focus:outline-none">
                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9Z" />
                                <path d="M13.73 21a2 2 0 0 1-3.46 0" />
                                </svg>
                            </button>
                            <div id="notificationDropdownRestaurant" class="hidden absolute right-0 z-50 mt-2 w-80 bg-white divide-y divide-gray-100 rounded-lg shadow-lg">
                                <div class="py-2 px-4 bg-gray-100 border-b">
                                    <span class="font-semibold text-gray-700">Notifikasi</span>
                                </div>
                                <div class="p-2 space-y-2 overflow-y-auto max-h-[250px]">
                                @if(session('notifications') !== null)
                                    @if (session('notifications')->count() > 0)
                                        @foreach (session('notifications') as $notif)
                                            @if ($notif['status'] == 'income_order')
                                            <a href="/transaction/{{ $notif['transaction_id'] }}" class="flex items-start p-2 bg-gray-50 hover:bg-gray-100 rounded-lg">
                                                <div class="ml-3 text-sm">
                                                <p class="font-medium text-gray-700">Terdapat pesanan masuk dari {{ $notif['customer_name'] }}, klik untuk melihat detail pesanan</p>
                                                <p class="text-gray-500 text-xs">{{ $notif['created_at']->diffForHumans() }}</p>
                                                </div>
                                            </a>
                                            @endif
                                        @endforeach
                                    @else
                                        <p class="text-sm text-gray-500 text-center">Tidak ada notifikasi</p>
                                    @endif
                                @endif
                                </div>
                            </div>
                        </div>
                    @endauth
        
                    <div class="flex items-center py-1 px-4 md:px-2 rounded-full hover:text-accent transition-all duration-500 {{ request()->routeIs('profile.view') ? 'bg-accent-selected' : '' }}">
                        <button id="dropdownHoverButton" data-dropdown-toggle="dropdownLanguage" data-dropdown-trigger="hover" type="button" class="flex items-center justify-between">
                            <div class="gap-1 flex items-center">
                                <svg class="w-5 h-5 ms-2.5" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10" />
                                    <line x1="2" y1="12" x2="22" y2="12" />
                                    <path d="M12 2a15.3 15.3 0 0 1 0 20a15.3 15.3 0 0 1 0-20" />
                                </svg>
                                <span>{{ (session()->get('locale') == 'en') ? 'EN' : 'ID' }}</span>
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
                            <a href="{{ route('profilePage') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">@lang('navbar.nav_dropdown_profile')</a>
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST" class="block">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">@lang('navbar.nav_dropdown_logout')</button>
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
                            <a href="{{ route('profilePage') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">@lang('navbar.nav_dropdown_profile')</a>
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST" class="block">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">@lang('navbar.nav_dropdown_logout')</button>
                            </form>
                        </li>
                    </ul>
                    </div>
                    @endauth
                    @guest('restaurant')
                    @guest('customer')
                    <ul class="flex items-center gap-2 md:gap-4">
                        <li class="border hover:border-accent py-1 px-6 rounded-full hover:text-accent hover:bg-transparent text-white bg-accent transition-all duration-500">
                            <a href="{{ route('loginPage') }}">@lang('navbar.nav_login')</a>
                        </li>
                        <li class="border hover:border-accent py-1 px-6 rounded-full hover:text-accent hover:bg-transparent text-white bg-accent transition-all duration-500">
                            <a href="{{ route('registerPage') }}">@lang('navbar.nav_register')</a>
                        </li>
                    </ul>
                    @endguest
                    @endguest
                </div>
            </div>
        </div>
    </div>
</navbar>