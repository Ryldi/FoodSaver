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
            <img src="{{ asset('img/auth/registerBG.png') }}" class="h-full object-cover" alt="Register Background">
        </div>
        <div class="w-1/2 flex">
            <div class="flex flex-col gap-2 mx-auto my-10 items-center">
                <div class="flex flex-col gap-2 mx-auto items-center">
                    <div class="flex flex-col gap-2">
                        <h1 class="text-5xl text-primary font-semibold text-center">Registrasi</h1>
                        <p class="text-davy font-medium text-2xl text-center">Halo, silahkan registrasi akun anda</p>
                    </div>  
                </div>
                <div class="border-b border-gray-200">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-styled-tab" data-tabs-toggle="#default-styled-tab-content" data-tabs-active-classes="text-white bg-green-600 border-green-600" data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300" role="tablist">
                        <li class="me-2" role="presentation">
                            <button
                            class="inline-block py-2 px-6 border-4 border-transparent rounded-lg text-black hover:border-green-600 hover:bg-green-600 hover:text-white transition-all duration-300"
                            id="profile-styled-tab" data-tabs-target="#styled-profile" type="button" role="tab" aria-controls="profile"
                            aria-selected="false">
                            Pengguna
                            </button>
                        </li>
                        <li class="me-2" role="presentation">
                            <button
                                class="inline-block py-2 px-6 border-4 border-transparent rounded-lg text-black hover:border-green-600 hover:bg-green-600 hover:text-white active:bg-green-600 active:text-white transition-all duration-300"
                                id="dashboard-styled-tab" data-tabs-target="#styled-dashboard" type="button" role="tab" aria-controls="dashboard"
                                aria-selected="false">
                                Restoran
                            </button>
                        </li>
                    </ul>
                </div>
                <div id="default-styled-tab-content" class="w-full">
                    <div class="flex items-center justify-center rounded-lg" id="styled-profile" role="tabpanel" aria-labelledby="profile-tab">
                        <form action="{{ route('sendOtp') }}" method="POST" class="flex flex-col w-5/6 gap-4 mt-4 justify-center">
                            @csrf
                            <input type="text" class="hidden" name="userType" value="customer">
                            <div class="flex flex-row gap-2">
                                <img src="{{ asset('img/auth/data-filled.png') }}" class="w-1/12" alt="">
                                <p class="font-extrabold text-primary">Data Pengguna</p>
                            </div>
                            <div>
                                <input type="text" id="customer_name" class=" rounded-xl w-full py-1 bg-neutral-light text-davy focus:outline-none focus:shadow-outline" placeholder="Nama Lengkap" name="customer_name" value="{{ old('customer_name') }}">
                                @error('customer_name')
                                    <p class="mx-2 text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <input type="text" id="customer_email" class="rounded-xl w-full py-1 bg-neutral-light text-davy focus:outline-none focus:shadow-outline" placeholder="Email" name="customer_email" value="{{ old('customer_email') }}">
                                @error('customer_email')
                                    <p class="mx-2 text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <input type="password" id="customer_password" class="shadow appearance-none border rounded-xl w-full py-1 bg-neutral-light text-davy focus:outline-none focus:shadow-outline" placeholder="Kata Sandi" name="customer_password" value="{{ old('customer_password') }}">
                                @error('customer_password')
                                    <p class="mx-2 text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <input type="text" id="customer_phone" class="rounded-xl w-full py-1 bg-neutral-light text-davy focus:outline-none focus:shadow-outline" placeholder="Nomor HP" name="customer_phone" value="{{ old('customer_name') }}">
                                @error('customer_phone')
                                    <p class="mx-2 text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <button class="bg-accent hover:bg-opacity-90 text-white font-semibold text-2xl py-1 px-10 rounded-xl" type="submit">
                                Registrasi
                            </button>
                        </form>
                    </div>
                    <div class="flex items-center justify-center rounded-lg" id="styled-dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                        <form action="{{ route('sendOtp') }}" method="POST" class="flex flex-col w-full gap-8 justify-center">
                            @csrf
                            <input type="text" class="hidden" name="userType" value="restaurant">
                            <div class="flex flex-row gap-8">
                                <div class="flex flex-col gap-4">
                                    <div class="flex flex-row gap-2">
                                        <img src="{{ asset('img/auth/data-filled.png') }}" class="w-1/12" alt="">
                                        <p class="font-extrabold text-primary">Data Restoran</p>
                                    </div>
                                    <div>
                                        <input type="text" id="restaurant_name" class=" rounded-xl w-full py-1 bg-neutral-light text-davy focus:outline-none focus:shadow-outline" placeholder="Nama Lengkap" name="restaurant_name" value="{{ old('restaurant_name') }}">
                                        @error('restaurant_name')
                                            <p class="mx-2 text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <input type="text" id="restaurant_email" class="rounded-xl w-full py-1 bg-neutral-light text-davy focus:outline-none focus:shadow-outline" placeholder="Email" name="restaurant_email" value="{{ old('restaurant_email') }}">
                                        @error('restaurant_email')
                                            <p class="mx-2 text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <input type="password" id="restaurant_password" class="shadow appearance-none border rounded-xl w-full py-1 bg-neutral-light text-davy focus:outline-none focus:shadow-outline" placeholder="Kata Sandi" name="restaurant_password">
                                        @error('restaurant_password')
                                            <p class="mx-2 text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <input type="text" id="restaurant_phone" class="rounded-xl w-full py-1 bg-neutral-light text-davy focus:outline-none focus:shadow-outline" placeholder="Nomor HP" name="restaurant_phone" value="{{ old('restaurant_phone') }}">
                                        @error('restaurant_phone')
                                            <p class="mx-2 text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <select id="countries" class="rounded-xl w-full py-1 bg-neutral-light text-davy focus:ring-blue-500 focus:border-blue-500 block" name="restaurant_category">
                                            <option disabled selected>Kategori</option>
                                            <option value="Makanan Rumahan">Home Food</option>
                                            <option value="Makanan Cepat Saji">Fast Food</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="flex flex-col gap-4">
                                    <div class="flex flex-row gap-2">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.8 13.938h-.011a7 7 0 1 0-11.464.144h-.016l.14.171c.1.127.2.251.3.371L12 21l5.13-6.248c.194-.209.374-.429.54-.659l.13-.155Z"/>
                                        </svg>
                                        
                                        <p class="font-extrabold text-primary">Alamat Restoran</p>
                                    </div>
                                    <div>
                                        <input type="text" id="restaurant_street" class="shadow appearance-none border rounded-xl w-full py-1 bg-neutral-light text-davy focus:outline-none focus:shadow-outline" placeholder="Nama Jalan" name="restaurant_street" value="{{ old('restaurant_street') }}">
                                        @error('restaurant_street')
                                            <p class="mx-2 text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <input type="text" id="restaurant_province" class="shadow appearance-none border rounded-xl w-full py-1 bg-neutral-light text-davy focus:outline-none focus:shadow-outline" placeholder="Provinsi" name="restaurant_province" value="{{ old('restaurant_province') }}">
                                        @error('restaurant_province')
                                            <p class="mx-2 text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <input type="text" id="restaurant_city" class="shadow appearance-none border rounded-xl w-full py-1 bg-neutral-light text-davy focus:outline-none focus:shadow-outline" placeholder="Kota" name="restaurant_city" value="{{ old('restaurant_city') }}">
                                        @error('restaurant_city')
                                            <p class="mx-2 text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <input type="text" id="restaurant_subdistrict" class="rounded-xl w-full py-1 bg-neutral-light text-davy focus:outline-none focus:shadow-outline" placeholder="Kecamatan" name="restaurant_subdistrict" value="{{ old('restaurant_subdistrict') }}">
                                        @error('restaurant_subdistrict')
                                            <p class="mx-2 text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <input type="text" id="restaurant_postal_code" class="shadow appearance-none border rounded-xl w-full py-1 bg-neutral-light text-davy focus:outline-none focus:shadow-outline" placeholder="Kode Pos" name="restaurant_postal_code" value="{{ old('restaurant_postal_code') }}">
                                        @error('restaurant_postal_code')
                                            <p class="mx-2 text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button class="bg-accent hover:bg-opacity-90 text-white font-semibold text-2xl py-1 px-10 rounded-xl" type="submmit">
                                Registrasi
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
                    <button class="flex flex-row bg-neutral-light border border-black justify-center py-1 px-4 rounded-xl focus:outline-none focus:shadow-outline" type="button">
                        <p>Login With </p>
                        <p class="font-bold ml-1">
                            Google 
                        </p>
                    </button>
                    <button class="flex flex-row bg-neutral-light border border-black justify-center py-1 px-4 rounded-xl focus:outline-none focus:shadow-outline" type="button">
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
        </div>
        <div id="authentication-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 items-center justify-center z-50">
            <div class="bg-white rounded-lg shadow-lg w-96 p-6">
                <div class="text-center mb-4">
                    <h3 class="text-xl font-semibold text-primary">Verifikasi OTP</h3>
                    <p class="text-sm text-primary">Kode kamu sudah dikirim melalui email</p>
                </div>
                <form action="{{ route('verifyOtp') }}" method="POST" id="otpFields" class="flex flex-col justify-center gap-2 mb-4">
                    @csrf
                    <div class="flex justify-between">
                        <input type="text" maxlength="1" class="w-12 h-12 border border-gray-300 rounded-lg text-center text-lg focus:outline-none focus:ring-2 focus:ring-blue-500" name="otp_1"/>
                        <input type="text" maxlength="1" class="w-12 h-12 border border-gray-300 rounded-lg text-center text-lg focus:outline-none focus:ring-2 focus:ring-blue-500" name="otp_2"/>
                        <input type="text" maxlength="1" class="w-12 h-12 border border-gray-300 rounded-lg text-center text-lg focus:outline-none focus:ring-2 focus:ring-blue-500" name="otp_3"/>
                        <input type="text" maxlength="1" class="w-12 h-12 border border-gray-300 rounded-lg text-center text-lg focus:outline-none focus:ring-2 focus:ring-blue-500" name="otp_4"/>
                        <input type="text" maxlength="1" class="w-12 h-12 border border-gray-300 rounded-lg text-center text-lg focus:outline-none focus:ring-2 focus:ring-blue-500" name="otp_5"/>
                        <input type="text" maxlength="1" class="w-12 h-12 border border-gray-300 rounded-lg text-center text-lg focus:outline-none focus:ring-2 focus:ring-blue-500" name="otp_6"/>
                    </div>
                    <div class="flex flex-col gap-2">
                        <button id="closeModal" class="bg-tertiary hover:bg-opacity-90 text-white py-2 px-4 rounded-lg">
                            Kirim
                        </button>
                    </div>
                    @error('otpFailed')
                        <p class="text-red-600">{{ $message }}</p>
                    @enderror
                </form>
                <form action="{{ route('sendOtp') }}" method="POST" class="flex justify-center">
                    @csrf
                    <button id="resendOtp" class="text-primary hover:underline text-sm text-center" type="submit">
                        Kirim Ulang OTP
                    </button>
                </form>
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
        @if (session('otp'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    otpModal.show()
                });
            </script>
        @endif
    </div>
    <script>
        const modalEl = document.getElementById('authentication-modal');
        const otpModal = new Modal(modalEl, {
            placement: 'center'
        });
    </script>
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