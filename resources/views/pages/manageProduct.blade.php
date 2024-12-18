@extends('layouts.master')

@section('content')

<div class="container mx-auto p-6 pt-32 ">
    <h2 class="text-2xl font-semibold text-center mb-6">Produk Tersedia</h2>
    <!-- Tombol Tambah Produk -->
    <button data-modal-target="add-product" data-modal-toggle="add-product" class="block text-white bg-accent hover:bg-white hover:text-accent border hover:border-accent transition-all duration-500 font-medium rounded-lg text-xs px-5 py-2.5 text-center mb-5" type="button">
        Tambah Produk +
    </button>

    <!-- Tabel Produk -->
    <div class="max-w-[100%] overflow-x-auto">
        <table class="min-w-full bg-white rounded-md shadow-md border border-gray-300">
            <thead class="bg-accent">
                <tr>
                    <th class="px-4 py-2 text-center text-sm font-semibold text-white border-b border-gray-300">Gambar Produk</th>
                    <th class="px-4 py-2 text-center text-sm font-semibold text-white border-b border-gray-300">Nama Menu</th>
                    <th class="px-4 py-2 text-center text-sm font-semibold text-white border-b border-gray-300">Harga</th>
                    <th class="px-4 py-2 text-center text-sm font-semibold text-white border-b border-gray-300">Stock</th>
                    <th class="px-4 py-2 text-center text-sm font-semibold text-white border-b border-gray-300">Tampilkan</th>
                    <th class="px-4 py-2 text-center text-sm font-semibold text-white border-b border-gray-300">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $item)
                <!-- Example Product Data -->
                <tr class="border-b border-gray-300">
                    <td class="px-4 py-2 text-center border-r border-gray-300">
                        <img src="{{ $item->image }}" alt="Alcapone" class="h-16 md:h-32 rounded-xl mx-auto" />
                    </td>
                    <td class="px-4 py-2 text-center text-primary border-r border-gray-300">{{ $item->name }}</td>
                    <td class="px-4 py-2 text-center text-primary border-r border-gray-300">{{ number_format($item->price, 0, ',', '.') }}</td>
                    <td class="px-4 py-2 text-center text-primary border-r border-gray-300">{{ $item->stock }}</td>
                    <td class="px-4 py-2 text-center text-primary border-r border-gray-300">
                        <form action="{{ route('changeProductStatus', ['id' => $item->id]) }}" method="POST" id="productStatusForm-{{ $item->id }}">
                            @csrf
                            @method('PUT')
                            <label class="inline-flex items-center mb-5 cursor-pointer">
                                <input type="checkbox" value="" id="statusToggle" class="sr-only peer" {{ $item->status == 1 ? 'checked' : '' }}>
                                <div class="relative w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-accent rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-600 peer-checked:bg-accent"></div>
                            </label>
                        </form>
                    </td>
                    <td class="px-4 py-2 text-center border-l border-gray-300">
                        <!-- Edit Button -->
                        <button data-modal-target="edit-product={{ $item->id }}" data-modal-toggle="edit-product-{{ $item->id }}" class="bg-accent text-white px-2 py-1 rounded-md inline-flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="butt" stroke-linejoin="round" stroke-width="2" d="M12 20h9M13 5l7 7-5 5-7-7 5-5z"></path>
                            </svg>
                            <span class="text-xs">Ubah</span>
                        </button>
                        @include('components.editProductModal', ['product' => $item])

                        <!-- Delete Button -->
                        <button data-modal-target="delete-product" data-modal-toggle="delete-product" data-product-id="{{ $item->id }}" class="bg-red text-white px-2 py-1 rounded-md inline-flex items-center justify-center ml-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="butt" stroke-linejoin="round" stroke-width="2" d="M19 7H5M9 7V5a2 2 0 012-2h2a2 2 0 012 2v2M4 7h16l-1 14H5L4 7z"></path>
                            </svg>
                            <span class="text-xs">Hapus</span>
                        </button>

                        @include('components.deleteProductModal', ['product' => $item])
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('components.addProductModal')

<script>
    document.querySelectorAll('input[type="checkbox"][id="statusToggle"]').forEach(toggleSwitch => {
        toggleSwitch.addEventListener('change', () => {
            const form = toggleSwitch.closest('form');
            if (form) {
                form.submit();
            }
        });
    });
    document.querySelectorAll('[data-modal-toggle="delete-product"]').forEach(button => {
        button.addEventListener('click', function() {
            const productId = button.getAttribute('data-product-id');
            
            const form = document.getElementById('deleteProductForm');
            form.action = `/deleteProduct/${productId}`;
            
            document.getElementById('delete-product-modal').classList.remove('hidden');
        });
    });
</script>

@endsection
