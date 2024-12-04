<navbar class="bg-neutral-light flex justify-between items-center border-b border-accent fixed w-full z-40 top-0 shadow-lg py-2">
  <div class="flex justify-between items-center container mx-auto">
      <a class="flex items-center gap-2" href="{{ route('indexPage') }}">
      <img src="{{ asset('img/logo.png') }}" alt="" class="w-32">
      </a>
      <div class="md:flex md:gap-8">
          <ul class="flex md:gap-4">
              <a href="{{ route('indexPage') }}" class="flex items-center py-1 px-4 md:px-6 rounded-full hover:text-accent transition-all duration-500 {{ request()->routeIs('indexPage') ? 'text-accent' : '' }} " aria-current="page">
              Home
              </a>
              <div class="flex items-center py-1 px-4 md:px-6 rounded-full hover:text-accent transition-all duration-500 {{ request()->routeIs('profile.view') ? 'text-accent' : '' }}">
                  <button id="dropdownHoverButton" data-dropdown-toggle="dropdownHover" data-dropdown-trigger="hover" type="button" class="flex items-center justify-between">
                      <span>Restoran</span>
                      <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                      </svg>
                  </button>
              </div>
              <!-- Dropdown menu -->
              <div id="dropdownHover" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                  <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverButton">
                      <li>
                          <a href="{{ route('categoryDetail') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Makanan Cepat Saji</a>
                      </li>
                      <li>
                          <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Roti & Kue</a>
                      </li>
                  </ul>
              </div>
              <a href="" class="flex items-center py-1 px-4 md:px-6 rounded-full hover:text-accent transition-all duration-500 {{ request()->routeIs('cart.view') ? 'bg-accent-selected' : '' }}">
              Promo
              </a>
              <a href="{{ route('about-us') }}" class="flex items-center py-1 px-4 md:px-6 rounded-full hover:bg-accent-selected transition-all duration-500 {{ request()->routeIs('about-us') ? 'text-accent' : '' }}">
              Tentang Kami
              </a>
          </ul>
      </div>
      <div class="md:flex gap-8">
          <div class="flex items-center py-1 px-4 md:px-6 rounded-full hover:text-accent transition-all duration-500 {{ request()->routeIs('profile.view') ? 'bg-accent-selected' : '' }}">
              <button id="dropdownHoverButton" data-dropdown-toggle="dropdownLanguage" data-dropdown-trigger="hover" type="button" class="flex items-center justify-between">
                  <div class="gap-1 flex items-center">
                      <svg class="w-5 h-5 ms-2.5" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                          <circle cx="12" cy="12" r="10" />
                          <line x1="2" y1="12" x2="22" y2="12" />
                          <path d="M12 2a15.3 15.3 0 0 1 0 20a15.3 15.3 0 0 1 0-20" />
                      </svg>
                      <span>ID</span>
                  </div>
                  <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                  </svg>
              </button>
          </div>
          <!-- Dropdown menu -->
          <div id="dropdownLanguage" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
              <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverButton">
                  <li>
                      <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Indonesia</a>
                  </li>
                  <li>
                      <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">English</a>
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
          <div id="dropdownProfile" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
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
          <div id="dropdownProfile" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
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
</navbar>