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
    <div class="flex flex-row h-screen items-center justify-center">
        <div class="w-1/2">
            <img src="{{ asset('img/auth/registerBG.png') }}" class="" alt="Register Background">
        </div>
        <form action="{{ route('sendOtp') }}" method="POST" class="w-1/2 flex">
            @csrf
            <div class="flex flex-col gap-6 mx-auto my-4 items-center">
                <div class="flex flex-col gap-4">
                    <h1 class="text-5xl text-primary font-semibold text-center">Registrasi</h1>
                    <p class="text-davy font-medium text-2xl text-center">Halo, silahkan registrasi akun anda</p>
                </div>  
                <div class="flex flex-col w-5/6 gap-4 mt-4">
                    <input type="text" id="username" class=" rounded-xl w-full py-2 bg-neutral-light text-davy focus:outline-none focus:shadow-outline" placeholder="Full Name" name="name">
                    <input type="text" id="email" class="rounded-xl w-full py-2 bg-neutral-light text-davy focus:outline-none focus:shadow-outline" placeholder="Email" name="email">
                    <input type="password" id="password" class="shadow appearance-none border rounded-xl w-full py-2 bg-neutral-light text-davy focus:outline-none focus:shadow-outline" placeholder="Password" name="password">
                    <input type="text" id="phoneNumber" class="rounded-xl w-full py-2 bg-neutral-light text-davy focus:outline-none focus:shadow-outline" placeholder="Nomor HP" name="phone">
                </div>
                <button class="bg-accent hover:bg-opacity-90 text-white font-semibold text-2xl py-2 px-10 rounded-xl" data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" type="button">
                    Registrasi
                </button>
                <div id="authentication-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 items-center justify-center z-50">
                    <div class="bg-white rounded-lg shadow-lg w-96 p-6">
                        <div class="text-center mb-4">
                            <h3 class="text-xl font-semibold text-primary">Verifikasi OTP</h3>
                            <p class="text-sm text-primary">Kode kamu sudah dikirim melalui email</p>
                        </div>
                        <div id="otpFields" class="flex justify-center gap-2 mb-4">
                            <input type="text" maxlength="1" class="w-12 h-12 border border-gray-300 rounded-lg text-center text-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
                            <input type="text" maxlength="1" class="w-12 h-12 border border-gray-300 rounded-lg text-center text-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
                            <input type="text" maxlength="1" class="w-12 h-12 border border-gray-300 rounded-lg text-center text-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
                            <input type="text" maxlength="1" class="w-12 h-12 border border-gray-300 rounded-lg text-center text-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
                            <input type="text" maxlength="1" class="w-12 h-12 border border-gray-300 rounded-lg text-center text-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
                            <input type="text" maxlength="1" class="w-12 h-12 border border-gray-300 rounded-lg text-center text-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        </div>
                        <div class="flex flex-col gap-2">
                            <button id="resendOtp" class="text-primary hover:underline text-sm">
                                Kirim Ulang OTP
                            </button>
                            <button id="closeModal" class="bg-tertiary hover:bg-opacity-90 text-white py-2 px-4 rounded-lg">
                                Kirim
                            </button>
                        </div>
                    </div>
                </div>
                {{-- ini untuk yang otp success --}}
                {{-- <div id="authentication-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 items-center justify-center z-50">
                    <div class="flex flex-col bg-white rounded-lg shadow-lg w-96 p-6 gap-2 items-center justify-center">
                        <div class="text-center">
                            <h3 class="text-xl font-semibold text-primary">Registrasi Sukses</h3>
                            <p class="text-sm text-primary">Akun kamu sudah dibuat!</p>
                        </div>
                        <img src="{{ asset('img/auth/success.png') }}" alt="">
                        <a href="{{ route('indexPage') }}" class="bg-tertiary hover:bg-opacity-90 text-white py-2 px-8 rounded-xl">
                        Home Page
                        </a>
                    </div>
                </div>  --}}
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
                <p class="mt-4 text-center text-davy">
                   Sudah Punya Akun? 
                    <a href="{{ route('loginPage') }}" class="text-tertiary hover:text-blue-700 font-medium">Masuk</a>
                </p>
            </div>
        </form>
    </div>
    <script>
        
    const otpInputs = document.querySelectorAll('#otpFields input');

    // Fokus otomatis ke kotak pertama saat halaman dimuat atau modal dibuka
    window.addEventListener('DOMContentLoaded', () => {
        otpInputs[0].focus();
    });

    otpInputs.forEach((input, index) => {
        input.addEventListener('input', (e) => {
            // Ambil semua nilai input dalam satu string
            const allInputValues = Array.from(otpInputs).map(input => input.value).join('');
            
            // Hanya masukkan angka dan bagi input ke dalam setiap kotak
            if (e.target.value.length > 1) {
                const values = e.target.value.split('');
                values.forEach((val, i) => {
                    if (i + index < otpInputs.length) {
                        otpInputs[i + index].value = val;
                    }
                });
            }
            
            // Pindah ke kotak berikutnya jika input penuh
            if (input.value.length === 1 && index < otpInputs.length - 1) {
                otpInputs[index + 1].focus();
            }
        });

        // Pastikan hanya angka yang dapat dimasukkan
        input.addEventListener('keypress', (e) => {
            if (!/[0-9]/.test(e.key)) {
                e.preventDefault();
            }
        });

        // Menghapus nilai saat backspace dan pindah ke kotak sebelumnya
        input.addEventListener('keydown', (e) => {
            if (e.key === 'Backspace' && input.value.length === 0 && index > 0) {
                otpInputs[index - 1].focus();
            }
        });
    });
    </script>
</body>
</html>