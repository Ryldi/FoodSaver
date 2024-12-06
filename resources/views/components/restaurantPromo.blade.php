<div class="min-h-screen bg-neutral px-10 py-10">
    <div class="flex flex-col justify-center items-center gap-4 mt-20 mx-28 text-primary">
        <h1 class="text-3xl font-semibold">Daftar Promo</h1>
        @include('components.hero_promo')
        <div class="flex mr-auto">
            <button id="defaultModalButton" data-modal-target="defaultModal" data-modal-toggle="defaultModal" class="flex items-center justify-center border hover:border-accent py-1 px-6 rounded-lg hover:text-accent hover:bg-transparent text-white bg-accent transition-all duration-500 whitespace-nowrap" type="button">
            Tambah Promo
            </button>
        </div>

        <div class="w-full max-w-2xl p-4 border-2 border-gray-800 rounded-lg shadow-md bg-neutral-light">
            <div class="flex flex-col w-full gap-4">
                <div class="w-full bg-neutral-light border border-black rounded-lg shadow-md">
                    <div class="flex">
                        <div class="flex items-center justify-center w-1/4 bg-red-500 text-white rounded-l-lg p-4">
                            <div class="text-center">
                                <h2 class="text-3xl font-extrabold">90%</h2>
                                <p class="text-lg font-semibold">OFF</p>
                            </div>
                        </div>
                        <div class="flex-grow flex flex-col justify-between px-6 py-4 bg-neutral-light border-l border-black">
                            <div class="flex items-center justify-between p-4 w-full">
                                <p class="text-sm">
                                    Diskon 90% hingga Rp 20.000 untuk pesan menu lezat pakai kode
                                    <span class="font-bold">J.CO</span>
                                </p>
                                <div class="flex flex-col gap-1">
                                    <button data-modal-target="delete-product" data-modal-toggle="delete-product" data-product-id="" class="bg-red text-white px-2 py-1 rounded-md inline-flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="butt" stroke-linejoin="round" stroke-width="2" d="M19 7H5M9 7V5a2 2 0 012-2h2a2 2 0 012 2v2M4 7h16l-1 14H5L4 7z"></path>
                                        </svg>
                                        <span class="text-xs">Hapus</span>
                                    </button>
                                    <button data-modal-target="edit-product=" data-modal-toggle="edit-product-" class="bg-accent text-white px-2 py-1 rounded-md inline-flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="butt" stroke-linejoin="round" stroke-width="2" d="M12 20h9M13 5l7 7-5 5-7-7 5-5z"></path>
                                        </svg>
                                        <span class="text-xs">Ubah</span>
                                    </button>
                                </div>
                            </div>
                            <hr class="border-t-2 border-black w-full my-4" />
                            <div class="flex justify-between items-center">
                                <a href="#" class="text-sm text-red-600 hover:underline" data-modal-target="promoModal" data-modal-toggle="promoModal">Syarat</a>
                                <p class="text-sm text-gray-500">Berakhir 31/01/2025</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex items-center gap-2 text-sm mt-4">
            <button class="w-8 h-8 text-gray-500 hover:text-black">&laquo;</button>
            <button class="w-8 h-8 flex items-center justify-center bg-blue-700 text-white rounded">1</button>
            <button class="w-8 h-8 flex items-center justify-center text-blue-700 border border-blue-700 rounded">2</button>
            <button class="w-8 h-8 flex items-center justify-center text-blue-700 border border-blue-700 rounded">3</button>
            <button class="w-8 h-8 text-gray-500 hover:text-black">&raquo;</button>
        </div>
    </div>

   <!-- Modal Syarat -->
   <div id="promoModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-lg h-full md:h-auto">
            <div class="relative bg-white rounded-lg shadow">
                <div class="flex justify-between items-center p-4 bg-blue-100 rounded-t-lg">
                    <div class="flex items-center gap-4">
                        <img src="{{ asset('img/restaurant/logo/Jco.png') }}" alt="" class="h-32 rounded-xl"/>
                        <p class="text-gray-800 text-sm font-semibold">
                            Diskon 70% hingga Rp 50.000 untuk pesan menu lezat pakai kode 
                            <span class="font-bold">J.CO</span>
                        </p>
                    </div>
                </div>
                <div class="p-6 bg-blue-50">
                    <h3 class="text-red-600 font-semibold text-sm">Syarat dan Ketentuan</h3>
                    <ul class="list-disc list-inside text-sm text-gray-700 mt-2">
                        <li>Minimum Belanja: Rp. 50.000</li>
                        <li>Ketentuan Berlaku: 1x per pelanggan</li>
                    </ul>
                </div>
                <div class="flex justify-between items-center p-4 bg-blue-100 rounded-b-lg">
                    <p class="text-sm text-gray-500">Berakhir 31/01/2025</p>
                    <button data-modal-hide="promoModal" type="button" class="px-4 py-2 bg-red-500 text-white text-sm rounded hover:bg-red-600">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Tambah --}}
    <div id="defaultModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <div class="flex items-end">
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-primary rounded-lg text-sm p-1.5 ml-auto  dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <h3 class="text-4xl font-semibold text-center text-primary dark:text-white">
                    Tambah Promo
                </h3>
                <form action="#" class="flex flex-col gap-4">
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-primary dark:text-white">Tag Promo</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-primary text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan Tag Promo" required="">
                    </div>
                    <div>
                        <label for="brand" class="block mb-2 text-sm font-medium text-primary dark:text-white">Deskripsi</label>
                        <input type="text" name="brand" id="brand" class="bg-gray-50 border border-gray-300 text-primary text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan Deskripsi" required="">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-primary dark:text-white">Syarat</label>
                        <textarea id="description" rows="4" class="block p-2.5 w-full text-sm text-primary bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan Syarat dan Ketentuan"></textarea>                    
                    </div>
                    <div class="">
                        <label for="date" class="block mb-2 text-sm font-medium text-primary dark:text-white">Berakhir Pada</label>
                        <input type="date" name="date" id="date" class="bg-gray-50 border border-gray-300 text-primary text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan Deskripsi" required="">
                    </div>
                    <button class="flex items-center justify-center border hover:border-accent py-1 px-6 rounded-lg hover:text-accent hover:bg-transparent text-white bg-accent transition-all duration-500 whitespace-nowrap" type="submit">
                        Tambahkan Promo
                    </button>
                </form>
            </div>
        </div>
    </div>

    {{-- Modal Update --}}
    <div id="edit-product-" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <div class="flex items-end">
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-primary rounded-lg text-sm p-1.5 ml-auto  dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="edit-product-">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <h3 class="text-4xl font-semibold text-center text-primary dark:text-white">
                    Ubah Promo
                </h3>
                <form action="#" class="flex flex-col gap-4">
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-primary dark:text-white">Tag Promo</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-primary text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan Tag Promo" required="">
                    </div>
                    <div>
                        <label for="brand" class="block mb-2 text-sm font-medium text-primary dark:text-white">Deskripsi</label>
                        <input type="text" name="brand" id="brand" class="bg-gray-50 border border-gray-300 text-primary text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan Deskripsi" required="">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-primary dark:text-white">Syarat</label>
                        <textarea id="description" rows="4" class="block p-2.5 w-full text-sm text-primary bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan Syarat dan Ketentuan"></textarea>                    
                    </div>
                    <div class="">
                        <label for="date" class="block mb-2 text-sm font-medium text-primary dark:text-white">Berakhir Pada</label>
                        <input type="date" name="date" id="date" class="bg-gray-50 border border-gray-300 text-primary text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan Deskripsi" required="">
                    </div>
                    <button class="flex items-center justify-center border hover:border-accent py-1 px-6 rounded-lg hover:text-accent hover:bg-transparent text-white bg-accent transition-all duration-500 whitespace-nowrap" type="submit">
                        Perbarui Promo
                    </button>
                </form>
            </div>
        </div>
    </div>


    {{-- Modah Delete --}}
    <div id="delete-product" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="delete-product">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <form id="deleteProductForm" method="POST" action="" class="p-4 md:p-5 text-center">
                    @csrf
                    @method('DELETE')
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this product?</h3>
                    <input type="hidden" name="id" value="">
                    <button data-modal-hide="delete-product" type="submit" class="bg-red hover:bg-white text-white hover:text-red border hover:border-red transition-all duration-500 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                        Yes, I'm sure
                    </button>
                    <button data-modal-hide="delete-product" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium rounded-lg bg-accent hover:bg-white text-white hover:text-accent border hover:border-accent transition-all duration-500">No, cancel</button>
                </form>
            </div>
        </div>
    </div>
    

</div>
