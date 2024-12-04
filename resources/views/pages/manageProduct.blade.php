@extends('layouts.master')

@section('content')


    <div class="container mx-auto p-6 mt-24">
        <h2 class="text-2xl font-semibold text-center mb-6">Produk Tersedia</h2>

        <!-- Tombol Tambah Produk -->
        <button onclick="showModal('add')" class="bg-blue-500 text-white px-4 py-2 rounded-md mb-4 inline-block">
            Tambah Produk
        </button>

        <!-- Tabel Produk -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-md shadow-md border border-gray-300">
                <thead class="bg-accent">
                    <tr>
                        <th class="px-4 py-2 text-center text-sm font-semibold text-white border-b border-gray-300">Gambar Produk</th>
                        <th class="px-4 py-2 text-center text-sm font-semibold text-white border-b border-gray-300">Nama Menu</th>
                        <th class="px-4 py-2 text-center text-sm font-semibold text-white border-b border-gray-300">Harga</th>
                        <th class="px-4 py-2 text-center text-sm font-semibold text-white border-b border-gray-300">Stock</th>
                        <th class="px-4 py-2 text-center text-sm font-semibold text-white border-b border-gray-300">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example Product Data -->
                    <tr class="border-b border-gray-300">
                        <td class="px-4 py-2 text-center border-r border-gray-300">
                            <img src="{{ asset('img/restaurant/product/alcaponeDonut.png') }}" alt="Alcapone" class="h-32 rounded-xl mx-auto" />
                        </td>
                        <td class="px-4 py-2 text-center text-primary border-r border-gray-300">Alcapone</td>
                        <td class="px-4 py-2 text-center text-primary border-r border-gray-300">Rp 6.000,00</td>
                        <td class="px-4 py-2 text-center text-primary border-r border-gray-300">10</td>
                        <td class="px-4 py-2 text-center border-l border-gray-300">
                        <div class="flex items-center gap-4">
                            <!-- Edit Button -->
                            <button onclick="showModal('edit', {id: 1, nama: 'Alcapone', harga: '6000', stok: 10, image: '{{ asset('img/restaurant/product/alcaponeDonut.png') }}'})" 
                                class="bg-accent text-white px-2 py-1 rounded-md inline-flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="butt" stroke-linejoin="round" stroke-width="2" d="M12 20h9M13 5l7 7-5 5-7-7 5-5z"></path>
                                </svg>
                                <span>Ubah</span>
                            </button>

                            <!-- Delete Button -->
                            <button onclick="showDeleteModal(1, 'Alcapone')" 
                                class="bg-red text-white px-2 py-1 rounded-md inline-flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="butt" stroke-linejoin="round" stroke-width="2" d="M19 7H5M9 7V5a2 2 0 012-2h2a2 2 0 012 2v2M4 7h16l-1 14H5L4 7z"></path>
                                </svg>
                                <span>Hapus</span>
                            </button>

                            <!-- Dark Mode Toggle -->
                            <div id="themeToggle" class="flex items-center w-32 h-12 bg-gray-200 rounded-full p-1 cursor-pointer transition-colors duration-300">
    <!-- Text -->
    <span id="toggleText" class="ml-2 text-sm font-medium text-gray-700">DAYMODE</span>
    
    <!-- Indicator (Circle) -->
    <div id="toggleIndicator" class="flex items-center justify-center w-10 h-10 bg-white rounded-full shadow transition-transform duration-300">
        <svg id="toggleIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-800" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="5"></circle>
            <line x1="12" y1="1" x2="12" y2="3"></line>
            <line x1="12" y1="21" x2="12" y2="23"></line>
            <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
            <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
            <line x1="1" y1="12" x2="3" y2="12"></line>
            <line x1="21" y1="12" x2="23" y2="12"></line>
            <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
            <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
        </svg>
    </div>
</div>
                        </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Produk -->
    <div id="modalTambahProduk" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center mt-24">
        <div class="bg-white w-full max-w-md rounded-lg shadow-lg p-6">
            <h2 id="modalTitle" class="text-xl font-bold mb-4">Tambah Produk</h2>
            <form id="productForm" method="POST" action="#">
                @csrf
                <!-- Gambar Produk -->
                <div class="mb-4">
                    <label for="gambar" class="block text-sm font-medium text-primary">Gambar Produk *</label>
                    <div id="currentImageContainer" class="mb-2">
                        <img id="currentImage" src="" alt="Current Product Image" class="h-32 rounded-xl mx-auto hidden" />
                    </div>
                    <input 
                        type="file" 
                        id="gambar" 
                        name="gambar" 
                        class="block w-full border border-gray-300 rounded-lg p-2 focus:ring-blue-300" 
                        accept=".jpg, .jpeg, .png"  
                        onchange="validateImage()"
                    >
                    <small id="gambarHelp" class="text-sm text-primary">Format gambar: jpg, jpeg, png (maksimal 2MB).</small>
                    <span id="gambarError" class="text-red text-sm mt-2 hidden">Mohon pilih gambar yang valid.</span>
                </div>
                <!-- Nama Produk -->
                <div class="mb-4">
                    <label for="nama" class="block text-sm font-medium text-primary">Nama Produk *</label>
                    <input 
                        type="text" 
                        id="nama" 
                        name="nama" 
                        class="block w-full border border-gray-300 rounded-lg p-2 focus:ring-blue-300" 
                        placeholder="Masukkan nama produk" 
                        required
                    >
                    <span id="namaError" class="text-red text-sm mt-2 hidden">Nama produk tidak boleh kosong.</span>
                </div>
                <!-- Harga Produk -->
                <div class="mb-4">
                    <label for="harga" class="block text-sm font-medium text-primary">Harga *</label>
                    <input 
                        type="text" 
                        id="harga" 
                        name="harga" 
                        class="block w-full border border-gray-300 rounded-lg p-2 focus:ring-blue-300" 
                        placeholder="Masukkan harga produk" 
                        required
                    >
                    <span id="hargaError" class="text-red text-sm mt-2 hidden">Harga produk tidak valid.</span>
                </div>
                <!-- Stok Produk -->
                <div class="mb-4">
                    <label for="stok" class="block text-sm font-medium text-primary">Stok *</label>
                    <input 
                        type="number" 
                        id="stok" 
                        name="stok" 
                        class="block w-full border border-gray-300 rounded-lg p-2 focus:ring-blue-300" 
                        placeholder="Masukkan stok produk" 
                        required
                        min="0" 
                    >
                    <span id="stokError" class="text-red text-sm mt-2 hidden">Stok produk tidak boleh kosong.</span>
                </div>
                <!-- Tombol -->
                <div class="flex justify-end gap-4">
                    <button type="button" onclick="hideModal()" class="px-4 py-2 text-sm font-medium bg-gray-200 rounded-lg hover:bg-gray-300">
                        Batal
                    </button>
                    <button type="submit" class="px-4 py-2 text-sm font-medium bg-accent text-white rounded-lg hover:bg-accent-hover">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Delete Confirmation -->
    <div id="modalDeleteProduk" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center mt-24">
        <div class="bg-white w-full max-w-md rounded-lg shadow-lg p-6">
            <h2 class="text-xl font-bold mb-4">Hapus Produk</h2>
            <p id="deleteMessage" class="mb-4">Apakah Anda yakin ingin menghapus produk ini?</p>
            <div class="flex justify-end gap-4">
                <button type="button" onclick="hideDeleteModal()" class="px-4 py-2 text-sm font-medium bg-gray-200 rounded-lg hover:bg-gray-300">
                    Batal
                </button>
                <button id="confirmDeleteButton" type="button" class="px-4 py-2 text-sm font-medium bg-red text-white rounded-lg hover:bg-red-hover">
                    Hapus
                </button>
            </div>
        </div>
    </div>

    <script>
    const toggle = document.getElementById('themeToggle');
    const indicator = document.getElementById('toggleIndicator');
    const toggleText = document.getElementById('toggleText');
    const icon = document.getElementById('toggleIcon');
    const htmlElement = document.documentElement;

    // Add event listener for toggle button click
    toggle.addEventListener('click', () => {
        // Toggle classes to change background and icon position
        toggle.classList.toggle('bg-green-500'); // Green background when active
        toggle.classList.toggle('bg-gray-200'); // Gray background when inactive

        // Change the text to "AKTIF" when active
        if (toggle.classList.contains('bg-green-500')) {
            toggleText.textContent = 'AKTIF';
            toggleText.classList.add('text-white');
            toggleText.classList.remove('text-gray-700');

            // Move the toggle indicator to the right
            indicator.classList.remove('translate-x-0');
            indicator.classList.add('translate-x-16');

            // Change icon to 'moon' when active
            icon.setAttribute('d', 'M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2z'); // Moon icon
        } else {
            toggleText.textContent = 'DAYMODE';
            toggleText.classList.remove('text-white');
            toggleText.classList.add('text-gray-700');

            // Move the toggle indicator to the left
            indicator.classList.remove('translate-x-16');
            indicator.classList.add('translate-x-0');

            // Change icon to 'sun' when inactive
            icon.setAttribute('d', 'M12 2V4M12 20v2m10-10h2M2 12h2m14.828-7.172l1.414 1.414M16.95 7.05l1.414 1.414M7.05 7.05L8.464 5.636M5.636 8.464L7.05 10'); // Sun icon
        }
    });
</script>

@endsection
