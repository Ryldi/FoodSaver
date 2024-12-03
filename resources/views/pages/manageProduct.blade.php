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
                        <th class="px-4 py-2 text-center text-sm font-semibold text-white border-b border-gray-300">Aksi</th>
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
                                class="bg-red text-white px-2 py-1 rounded-md inline-flex items-center justify-center ml-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="butt" stroke-linejoin="round" stroke-width="2" d="M19 7H5M9 7V5a2 2 0 012-2h2a2 2 0 012 2v2M4 7h16l-1 14H5L4 7z"></path>
                                </svg>
                                <span>Hapus</span>
                            </button>
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

    <!-- Script Modal dan Validasi -->
    <script>
        const modal = document.getElementById('modalTambahProduk');
        const modalDelete = document.getElementById('modalDeleteProduk');
        let deleteProductId = null;

        // Show modal for add or edit
        function showModal(action, product = null) {
            modal.classList.remove('hidden');
            resetValidationMessages();
            if (action === 'add') {
                document.getElementById('modalTitle').textContent = 'Tambah Produk';
                document.getElementById('nama').value = '';
                document.getElementById('harga').value = '';
                document.getElementById('stok').value = '';
                document.getElementById('gambar').value = '';
                document.getElementById('currentImage').classList.add('hidden');
            } else if (action === 'edit') {
                document.getElementById('modalTitle').textContent = 'Ubah Produk';
                document.getElementById('nama').value = product.nama;
                document.getElementById('harga').value = product.harga;
                document.getElementById('stok').value = product.stok;
                document.getElementById('currentImage').src = product.image;
                document.getElementById('currentImage').classList.remove('hidden');
            }
        }

        // Hide modal
        function hideModal() {
            modal.classList.add('hidden');
        }

        // Show delete confirmation modal
        function showDeleteModal(productId, productName) {
            deleteProductId = productId;
            document.getElementById('deleteMessage').textContent = `Apakah Anda yakin ingin menghapus produk: ${productName}?`;
            modalDelete.classList.remove('hidden');
        }

        // Hide delete confirmation modal
        function hideDeleteModal() {
            modalDelete.classList.add('hidden');
        }

        // Confirm delete action
        document.getElementById('confirmDeleteButton').addEventListener('click', function() {
            alert(`Produk dengan ID ${deleteProductId} berhasil dihapus!`);
            hideDeleteModal();
        });

        // Reset validation error messages
        function resetValidationMessages() {
            document.getElementById('gambarError').classList.add('hidden');
            document.getElementById('namaError').classList.add('hidden');
            document.getElementById('hargaError').classList.add('hidden');
            document.getElementById('stokError').classList.add('hidden');
        }

        // Validate form
        document.getElementById('productForm').addEventListener('submit', function(event) {
            let isValid = true;

            // Validate gambar
            const gambar = document.getElementById('gambar');
            if (!gambar.files.length) {
                document.getElementById('gambarError').classList.remove('hidden');
                isValid = false;
            }

            // Validate nama
            const nama = document.getElementById('nama').value;
            if (!nama) {
                document.getElementById('namaError').classList.remove('hidden');
                isValid = false;
            }

            // Validate harga
            const harga = document.getElementById('harga').value;
            if (!harga || isNaN(harga) || harga <= 0) {
                document.getElementById('hargaError').classList.remove('hidden');
                isValid = false;
            }

            // Validate stok
            const stok = document.getElementById('stok').value;
            if (!stok || stok < 0) {
                document.getElementById('stokError').classList.remove('hidden');
                isValid = false;
            }

            if (!isValid) {
                event.preventDefault();
            }
        });

        // Image validation (format & size)
        function validateImage() {
            const gambarInput = document.getElementById('gambar');
            const gambarFile = gambarInput.files[0];
            const maxSize = 2 * 1024 * 1024; // 2MB
            const allowedExtensions = ['image/jpeg', 'image/png'];

            if (gambarFile) {
                if (!allowedExtensions.includes(gambarFile.type)) {
                    alert('Hanya file dengan ekstensi JPG, JPEG, atau PNG yang diperbolehkan.');
                    gambarInput.value = ''; // Reset the file input
                } else if (gambarFile.size > maxSize) {
                    alert('Ukuran file terlalu besar. Maksimal 2MB.');
                    gambarInput.value = ''; // Reset the file input
                }
            }
        }
    </script>
@endsection
