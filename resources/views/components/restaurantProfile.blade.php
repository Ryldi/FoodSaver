{{-- Banner Section --}}
<div class="relative bg-white shadow-md rounded-lg overflow-hidden">
    <img src="{{ asset('img/profile/profileBanner.png') }}" alt="Banner" class="w-full h-50 object-cover">
</div>

{{-- Profile Section --}}
<div class="relative -mt-20 text-center overflow-hidden">
    <div class="relative w-32 h-32 mx-auto -mt-17">
        <img src="{{ (Auth::guard('restaurant')->user()->image) ? asset('storage/' . Auth::guard('restaurant')->user()->image) : asset('img/rest_avatar.png') }}" alt="Profile" class="w-full h-full rounded-full border-4 bg-white">
        <button class="absolute bottom-0 right-0 bg-accent text-white p-2 rounded-full hover:bg-accent-hover">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 3l8 8-9 9H4v-8L13 3z"/>
            </svg>
        </button>
    </div>
    <p class="text-primary font-semibold text-3xl mt-2">{{ Auth::guard('restaurant')->user()->name }}</p>
    <p class="text-accent">Bergabung sejak {{ Auth::guard('restaurant')->user()->created_at->format('F Y') }}</p>
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
                    <p class="text-primary font-medium">{{ Auth::guard('restaurant')->user()->address }}</p>
                </div>
                <div class="flex justify-between items-center border-b pb-2">
                    <p class="text-primary">Email</p>
                    <p class="text-primary font-medium">{{ Auth::guard('restaurant')->user()->email }}</p>
                </div>
                <div class="flex justify-between items-center border-b pb-2">
                    <p class="text-primary">Nomor HP</p>
                    <p class="text-primary font-medium">{{ Auth::guard('restaurant')->user()->phone }}</p>
                </div>
                <div class="flex justify-between items-center border-b pb-2">
                    <p class="text-primary">Bergabung</p>
                    <p class="text-primary font-medium">{{ Auth::guard('restaurant')->user()->created_at->format('d F Y') }}</p>
                </div>
                <div class="mt-6 flex flex-col gap-3">
                    <button class="w-full bg-accent  text-white py-2 rounded-lg hover:bg-accent-hover">
                        Ubah Password
                    </button>
                    <form action="{{ route('logout') }}" method="POST" class="mt-4">
                        @csrf
                        <button type="submit" class="w-full bg-red text-white py-2 rounded-lg hover:bg-red-hover">
                            Keluar
                        </button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Address Section (Kanan) --}}
        <div class="bg-white shadow-md rounded-lg p-4 md:p-6">
            <h2 class="text-2xl font-bold mb-4">Alamat</h2>
            <iframe
                src="https://maps.google.com/maps?q={{ urlencode(Auth::guard('restaurant')->user()->street) }}+Kec.+{{ urlencode(Auth::guard('restaurant')->user()->subdistrict) }},+Kota+{{ urlencode(Auth::guard('restaurant')->user()->city) }},+{{ urlencode(Auth::guard('restaurant')->user()->province) }}+{{ urlencode(Auth::guard('restaurant')->user()->postal_code) }}&t=&z=13&ie=UTF8&iwloc=&output=embed"
                width="100%"
                height="300"
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
                    Jl. {{ Auth::guard('restaurant')->user()->street }}, Kec. {{ Auth::guard('restaurant')->user()->subdistrict }}, Kota {{ Auth::guard('restaurant')->user()->city }}, {{ Auth::guard('restaurant')->user()->province }} {{ Auth::guard('restaurant')->user()->postal_code }}
                </p>
            </div>
        </div>
    </div>
</div>

<div id="ubahAlamatModal" class="hidden">
    <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white rounded-lg w-96 p-6">
            <h2 class="text-xl font-semibold mb-4">Ubah Alamat</h2>
            <form id="ubahAlamatForm" action="#" method="POST">
                @csrf
                <!-- Nama Jalan -->
                <div class="mb-4">
                    <label for="nama_jalan" class="block text-primary font-medium">Nama Jalan</label>
                    <input id="nama_jalan" name="nama_jalan" type="text" class="w-full p-2 border border-gray-300 rounded-md">
                </div>
                <!-- Kecamatan -->
                <div class="mb-4">
                    <label for="kecamatan" class="block text-primary font-medium">Kecamatan</label>
                    <input id="kecamatan" name="kecamatan" type="text" class="w-full p-2 border border-gray-300 rounded-md">
                </div>
                <!-- Kota -->
                <div class="mb-4">
                    <label for="kota" class="block text-primary font-medium">Kota</label>
                    <input id="kota" name="kota" type="text" class="w-full p-2 border border-gray-300 rounded-md">
                </div>
                <!-- Provinsi -->
                <div class="mb-4">
                    <label for="provinsi" class="block text-primary font-medium">Provinsi</label>
                    <input id="provinsi" name="provinsi" type="text" class="w-full p-2 border border-gray-300 rounded-md">
                </div>
                <!-- Kode Pos -->
                <div class="mb-4">
                    <label for="kode_pos" class="block text-primary font-medium">Kode Pos</label>
                    <input id="kode_pos" name="kode_pos" type="text" class="w-full p-2 border border-gray-300 rounded-md">
                </div>
                <!-- Pesan Wajib -->
                <p id="error-message" class="text-red-500 text-sm mt-2 hidden">* Semua field wajib diisi</p>
                <!-- Action Buttons -->
                <div class="flex justify-end space-x-4 mt-4">
                    <button type="button" class="bg-gray-300 text-primary py-2 px-4 rounded-md" id="closeModalBtn">Batal</button>
                    <button type="submit" class="bg-accent text-white py-2 px-4 rounded-md">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const ubahAlamatBtn = document.getElementById('ubahAlamatBtn');
        const modal = document.getElementById('ubahAlamatModal');
        const closeModalBtn = document.getElementById('closeModalBtn');
        const form = document.getElementById('ubahAlamatForm');
        const errorMessage = document.getElementById('error-message');

        // Event listener untuk tombol "Ubah Alamat"
        if (ubahAlamatBtn && modal && closeModalBtn) {
            ubahAlamatBtn.addEventListener('click', () => {
                modal.classList.remove('hidden');
            });

            // Event listener untuk tombol "Batal"
            closeModalBtn.addEventListener('click', () => {
                modal.classList.add('hidden');
            });

            // Validasi dan pengiriman form
            form.addEventListener('submit', (e) => {
                e.preventDefault(); // Mencegah form dikirim jika validasi gagal

                // Ambil nilai dari setiap input field
                const namaJalan = document.getElementById('nama_jalan').value;
                const kecamatan = document.getElementById('kecamatan').value;
                const kota = document.getElementById('kota').value;
                const provinsi = document.getElementById('provinsi').value;
                const kodePos = document.getElementById('kode_pos').value;

                // Cek apakah ada field yang kosong
                if (!namaJalan || !kecamatan || !kota || !provinsi || !kodePos) {
                    errorMessage.classList.remove('hidden'); // Tampilkan pesan error jika ada field yang kosong
                } else {
                    errorMessage.classList.add('hidden'); // Sembunyikan pesan error jika semua field diisi
                    // Form valid, kirim form
                    window.location.href = '/profile'; // Ganti sesuai dengan URL yang sesuai
                }
            });
        } else {
            console.error('Element not found!');
        }
    });

</script>

