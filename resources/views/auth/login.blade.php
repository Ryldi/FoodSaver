<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <script src="../path/to/flowbite/dist/flowbite.min.js" defer></script>
</head>
<body class="bg-neutral overflow-hidden">
    <div class="flex flex-row h-screen">
        <div class="w-1/2 flex">
            <form action="{{ route('login') }}" method="POST" class="flex flex-col gap-8 mx-auto my-10 items-center">
                @csrf
                <div class="flex flex-col gap-4">
                    <h1 class="text-5xl text-primary font-semibold text-center">Masuk</h1>
                    <p class="text-davy font-medium text-2xl text-center">Halo, silahkan masuk menggunakan akun anda</p>
                </div>  
                <div class="flex flex-col w-5/6 gap-4 mt-4">
                    <input type="email" id="email" class=" rounded-xl w-full py-2 bg-neutral-light text-davy focus:outline-none focus:shadow-outline" placeholder="Email" name="email">
                    <input type="password" id="password" class="shadow appearance-none border rounded-xl w-full py-2 bg-neutral-light text-davy focus:outline-none focus:shadow-outline" placeholder="Password" name="password">
                </div>
                <button class="bg-accent hover:bg-blue-700 text-white font-semibold text-2xl py-2 px-10 rounded-xl" type="submit">
                    Masuk
                </button>
                <div class="flex items-center w-4/6 justify-between mt-4">
                    <hr class="w-full border-t border-black">
                    <span class="text-davy mx-2">Atau</span>
                    <hr class="w-full border-t border-black">
                </div>
                <div class="flex flex-col gap-4 justify-around mt-4 w-4/6">
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
            </form>
        </div>
        <div class="w-1/2">
            <img src="{{ asset('Assets/loginBG.png') }}" class="" alt="Login Background">
        </div>
    </div>
</body>
</html>