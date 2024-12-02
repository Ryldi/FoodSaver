<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    @include('layouts.dependency')
</head>
<body class="bg-neutral overflow-hidden">
    <div class="flex flex-row h-screen">
        <div class="w-1/2 flex">
            <div class="flex flex-col gap-6  mx-auto my-10 items-center">
                <div class="flex flex-col gap-2">
                    <h1 class="text-5xl text-primary font-semibold text-center">Masuk</h1>
                    <p class="text-davy font-medium text-2xl text-center">Halo, silahkan masuk menggunakan akun anda</p>
                </div>
                <div class="border-b border-gray-200">
                    <ul class="flex flex-wrap gap-2 -mb-px text-sm font-medium text-center" id="default-styled-tab" data-tabs-toggle="#default-styled-tab-content" data-tabs-active-classes="text-purple-600 hover:text-purple-600 dark:text-purple-500 dark:hover:text-purple-500 border-purple-600 dark:border-purple-500" data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300" role="tablist">
                        <li class="me-2" role="presentation">
                            <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-styled-tab" data-tabs-target="#styled-profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Pengguna</button>
                        </li>
                        <li class="me-2" role="presentation">
                            <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300" id="dashboard-styled-tab" data-tabs-target="#styled-dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Restoran</button>
                        </li>
                    </ul>
                </div>
                <div id="default-styled-tab-content" class="w-full">
                    <div class="flex items-center justify-center rounded-lg" id="styled-profile" role="tabpanel" aria-labelledby="profile-tab">
                        <form action="{{ route('login') }}" method="POST" class="flex flex-col w-5/6 gap-4 mt-4">
                            @csrf
                            <input type="email" id="email" class=" rounded-xl w-full py-2 bg-neutral-light text-davy focus:outline-none focus:shadow-outline" placeholder="Email" name="email">
                            <input type="password" id="password" class="shadow appearance-none border rounded-xl w-full py-2 bg-neutral-light text-davy focus:outline-none focus:shadow-outline" placeholder="Password" name="password">
                            <button class="bg-accent hover:bg-opacity-90 text-white font-semibold text-2xl py-2 px-10 rounded-xl" type="submit">
                                Masuk
                            </button>
                        </form>
                    </div>
                    <div class="flex items-center justify-center rounded-lg" id="styled-dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                        <form action="{{ route('login') }}" method="POST" class="flex flex-col w-5/6 gap-4 mt-4">
                            @csrf
                            <input type="email" id="email" class=" rounded-xl w-full py-2 bg-neutral-light text-davy focus:outline-none focus:shadow-outline" placeholder="Email" name="email">
                            <input type="password" id="password" class="shadow appearance-none border rounded-xl w-full py-2 bg-neutral-light text-davy focus:outline-none focus:shadow-outline" placeholder="Password" name="password">
                            <button class="bg-accent hover:bg-opacity-90 text-white font-semibold text-2xl py-2 px-10 rounded-xl" type="submit">
                                Masuk
                            </button>
                        </form>
                    </div>
                </div>
                <div class="flex items-center w-4/6 justify-between">
                    <hr class="w-full border-t border-black">
                    <span class="text-davy mx-2">Atau</span>
                    <hr class="w-full border-t border-black">
                </div>
                <div class="flex flex-col gap-4 justify-around w-4/6">
                    <button class="flex flex-row bg-neutral-light border border-black justify-center py-2 px-4 rounded-xl focus:outline-none focus:shadow-outline" type="button">
                        <p>Login With </p>
                        <p class="font-bold ml-1">
                            Google 
                        </p>
                    </button>
                    <button class="flex flex-row bg-neutral-light border border-black justify-center py-2 px-4 rounded-xl focus:outline-none focus:shadow-outline" type="button">
                        <p>Login With </p>
                        <p class="font-bold ml-1">
                            Facebook
                        </p>
                    </button>
                </div>
                <p class="mt-6 text-center text-davy">
                    Belum Punya Akun? 
                    <a href="{{ route('registerPage') }}" class="text-tertiary hover:text-blue-700 font-medium">Registrasi</a>
                </p>
            </div>
        </div>
        <div class="w-1/2">
            <img src="{{ asset('img/auth/loginBG.png') }}" class="" alt="Login Background">
        </div>
    </div>
</body>
</html>