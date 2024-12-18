<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    @include('layouts.dependency')
</head>
<body class="font-poppins">
    @include('components.navbar')
    @include('components.toast')

    @auth('customer')
        <div class="absolute z-[31] w-full">
            <a href="{{ route('cartPage') }}" class="fixed right-1 md:right-24 top-28">
                <svg class="hover:scale-110 transition-all duration-500" xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 120 120">
                    <rect x="30" y="40" width="60" height="50" rx="10" ry="10" fill="#EAF5EF" stroke="#2D6457" stroke-width="4" />
                    <path d="M40 40 Q40 25 60 25 Q80 25 80 40" fill="none" stroke="#2D6457" stroke-width="4" />
                    <circle cx="80" cy="80" r="16" fill="#8ED6F4" />
                    <text x="80" y="88" text-anchor="middle" font-size="22" font-family="Arial" fill="#EAF5EF" font-weight="bold">{{ session('cart_counts') }}</text>
                </svg>
            </a>
        </div>
    @endauth
    
    <div class="min-h-screen">
        @yield('content')
    </div>

    @include('components.footer')
</body>
</html>