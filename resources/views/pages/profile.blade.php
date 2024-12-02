@extends('layouts.master')

@section('content')
<div class="min-h-screen bg-white pt-20">
    {{-- Banner Section --}}
    <div class="relative bg-white shadow-md rounded-lg overflow-hidden">
        <img src="{{ asset('img/profile/profileBanner.png') }}" alt="Banner" class="w-full h-50 object-cover">
    </div>

    {{-- Profile Section --}}
    <div class="relative -mt-20 text-center overflow-hidden">
        <div class="relative w-32 h-32 mx-auto -mt-17">
            <img src="{{ asset('img/profile/profileImage.png') }}" alt="Profile" class="w-full h-full rounded-full border-4 border-white">
            <button class="absolute bottom-0 right-0 bg-accent text-white p-2 rounded-full hover:bg-accent-hover">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 3l8 8-9 9H4v-8L13 3z"/>
                </svg>
            </button>
        </div>
        <p class="text-primary font-semibold text-3xl mt-2">Bernard Bereness</p>
        <p class="text-accent">Bergabung sejak November 2024</p>
    </div>

    {{-- Info and Address Section --}}
    <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 gap-6 mt-12 px-4 pb-20">
        {{-- Information and Address Section --}}
        <div class="col-span-2 grid grid-cols-1 lg:grid-cols-2 gap-6">
            {{-- Information Card (Kiri) --}}
            <div class="bg-white shadow-md rounded-lg p-4 md:p-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-bold">Informasi</h2>
                    <button id="ubahAlamatBtn" class="flex items-center bg-accent text-white py-1 px-4 rounded-lg hover:bg-accent-hover">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 4l4 4-9 9H4v-4L16 4z"/>
                        </svg>
                        Ubah Alamat
                    </button>
                </div>
                <div class="space-y-4">
                    <div class="flex justify-between items-center border-b pb-2">
                        <p class="text-primary">Nama Lengkap</p>
                        <p class="text-primary font-medium">Bernard Bereness</p>
                    </div>
                    <div class="flex justify-between items-center border-b pb-2">
                        <p class="text-primary">Email</p>
                        <p class="text-primary font-medium">bernard@gmail.com</p>
                    </div>
                    <div class="flex justify-between items-center border-b pb-2">
                        <p class="text-primary">Nomor HP</p>
                        <p class="text-primary font-medium">+62 812-7981-0073</p>
                    </div>
                    <div class="flex justify-between items-center border-b pb-2">
                        <p class="text-primary">Bergabung</p>
                        <p class="text-primary font-medium">02 November 2024</p>
                    </div>
                </div>
            </div>

            {{-- Address Section (Kanan) --}}
            <div class="bg-white shadow-md rounded-lg p-4 md:p-6">
                <h2 class="text-2xl font-bold mb-4">Alamat</h2>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d253840.61240586318!2d106.68943060595933!3d-6.229746562433691!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMTMnNTAuNyJTIDEwNsKwNDAuNzUiRQ!5e0!3m2!1sen!2sid!4v1630918476474!5m2!1sen!2sid"
                    width="100%"
                    height="200"
                    frameborder="0"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    class="rounded-lg">
                </iframe>
                <div class="flex items-center space-x-2 mt-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-accent" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 2C8.13 2 5 5.13 5 8c0 3.13 3 6.7 7 11.93 4-5.23 7-8.8 7-11.93 0-2.87-3.13-6-7-6zm0 10c-1.38 0-2.5-1.12-2.5-2.5S10.62 7 12 7s2.5 1.12 2.5 2.5S13.38 12 12 12z"/>
                    </svg>
                    <p class="text-primary">
                        Kyai Haji Syahdan Street, No. 38, RT.1/ RW.6, South Sukabumi, Kebon Jeruk, West Jakarta City, DKI Jakarta, ID 11540
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal --}}
<div id="ubahAlamatModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg w-96 p-6">
        <h2 class="text-xl font-semibold mb-4">Ubah Alamat</h2>
        <form action="#" method="POST">
            @csrf
            <div class="mb-4">
                <textarea id="alamat" name="alamat" rows="4" class="w-full p-2 border border-gray-300 rounded-md"></textarea>
            </div>
            <div class="flex justify-end space-x-4">
                <button type="button" class="bg-gray-300 text-black py-2 px-4 rounded-md" id="closeModalBtn">Batal</button>
                <button type="submit" class="bg-accent text-white py-2 px-4 rounded-md">Simpan</button>
            </div>
        </form>
    </div>
</div>

@endsection

<script>
        document.addEventListener('DOMContentLoaded', () => {
            const ubahAlamatBtn = document.getElementById('ubahAlamatBtn');
            const modal = document.getElementById('ubahAlamatModal');
            const closeModalBtn = document.getElementById('closeModalBtn');
            const form = modal.querySelector('form');

            if (ubahAlamatBtn && modal && closeModalBtn) {
                ubahAlamatBtn.addEventListener('click', () => {
                    modal.classList.remove('hidden');
                });

                closeModalBtn.addEventListener('click', () => {
                    modal.classList.add('hidden');
                });

                form.addEventListener('submit', (e) => {
                    e.preventDefault();
                    window.location.href = '/profile';
                });
            } else {
                console.error('Element not found!');
            }
        });
</script>

