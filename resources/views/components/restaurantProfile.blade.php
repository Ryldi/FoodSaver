{{-- Banner Section --}}
<div class="relative bg-white shadow-md rounded-lg overflow-hidden">
    <img src="{{ asset('img/profile/profileBanner.png') }}" alt="Banner" class="w-full h-50 object-cover">
</div>

{{-- Profile Section --}}
<div class="relative -mt-20 text-center overflow-hidden">
    <div class="relative w-32 h-32 mx-auto -mt-17">
        <img src="{{ (Auth::guard('restaurant')->user()->image) ? Auth::guard('restaurant')->user()->image : asset('img/rest_avatar.png') }}" alt="Profile" class="w-full h-full rounded-full border-4 bg-white">
        <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="absolute bottom-0 right-0 bg-accent text-white p-2 rounded-full hover:bg-accent-hover">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 3l8 8-9 9H4v-8L13 3z"/>
            </svg>
        </button>
    </div>
    <p class="text-primary font-semibold text-3xl mt-2">{{ Auth::guard('restaurant')->user()->name }}</p>
    <p class="text-accent">@lang('restaurantProfile.joined') {{ Auth::guard('restaurant')->user()->created_at->format('F Y') }}</p>
</div>

{{-- Info and Address Section --}}
<div class="container mx-auto grid grid-cols-1 md:grid-cols-2 gap-6 mt-12 px-4 pb-20">
    {{-- Information and Address Section --}}
    <div class="col-span-2 grid grid-cols-1 lg:grid-cols-2 gap-6">
        {{-- Information Card (Kiri) --}}
        <div class="bg-white shadow-md rounded-lg p-4 md:p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold">@lang('restaurantProfile.information')</h2>
                <button id="ubahAlamatBtn" class="flex items-center bg-accent text-white py-1 px-4 rounded-lg hover:bg-accent-hover">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 4l4 4-9 9H4v-4L16 4z"/>
                    </svg>
                    @lang('restaurantProfile.change_address')
                </button>
            </div>
            <div class="space-y-4">
                <div class="flex justify-between items-center border-b pb-2">
                    <p class="text-primary">@lang('restaurantProfile.full_name')</p>
                    <p class="text-primary font-medium">{{ Auth::guard('restaurant')->user()->name }}</p>
                </div>
                <div class="flex justify-between items-center border-b pb-2">
                    <p class="text-primary">@lang('restaurantProfile.email')</p>
                    <p class="text-primary font-medium">{{ Auth::guard('restaurant')->user()->email }}</p>
                </div>
                <div class="flex justify-between items-center border-b pb-2">
                    <p class="text-primary">@lang('restaurantProfile.phone_number')</p>
                    <p class="text-primary font-medium">{{ Auth::guard('restaurant')->user()->phone }}</p>
                </div>
                <div class="flex justify-between items-center border-b pb-2">
                    <p class="text-primary">@lang('restaurantProfile.joined')</p>
                    <p class="text-primary font-medium">{{ Auth::guard('restaurant')->user()->created_at->format('d F Y') }}</p>
                </div>
                <div class="mt-6 flex flex-col gap-3">
                    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="w-full bg-accent text-white py-2 rounded-lg hover:bg-accent-hover">
                        @lang('restaurantProfile.change_password')
                    </button>
                    <button data-modal-target="desc-modal" data-modal-toggle="desc-modal" class="w-full bg-accent text-white py-2 rounded-lg hover:bg-accent-hover">
                        @lang('restaurantProfile.change_description')
                    </button>
                    <form action="{{ route('logout') }}" method="POST" class="mt-4">
                        @csrf
                        <button type="submit" class="w-full bg-red text-white py-2 rounded-lg hover:bg-red-hover">
                            @lang('restaurantProfile.logout')
                        </button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Address Section --}}
        <div class="bg-white shadow-md rounded-lg p-4 md:p-6">
            <h2 class="text-2xl font-bold mb-4">@lang('restaurantProfile.address')</h2>
            <iframe
                src="https://maps.google.com/maps?q={{ urlencode(Auth::guard('restaurant')->user()->name) }}+{{ urlencode(Auth::guard('restaurant')->user()->street) }}+Kec.+{{ urlencode(Auth::guard('restaurant')->user()->subdistrict) }},+Kota+{{ urlencode(Auth::guard('restaurant')->user()->city) }},+{{ urlencode(Auth::guard('restaurant')->user()->province) }}+{{ urlencode(Auth::guard('restaurant')->user()->postal_code) }}&t=&z=13&ie=UTF8&iwloc=&output=embed"
                width="100%"
                height="300"
                frameborder="0"
                style="border:0;"
                allowfullscreen=""
                loading="lazy"
                class="rounded-lg">
            </iframe>
            <div class="flex items-center space-x-2 mt-4">
                <svg class="w-[48px] h-[48px] text-accent dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z" clip-rule="evenodd"/>
                </svg>                                                 
                <p class="text-primary">
                    {{ Auth::guard('restaurant')->user()->street }}, Kec. {{ Auth::guard('restaurant')->user()->subdistrict }}, Kota {{ Auth::guard('restaurant')->user()->city }}, {{ Auth::guard('restaurant')->user()->province }} {{ Auth::guard('restaurant')->user()->postal_code }}
                </p>
            </div>
        </div>
    </div>
</div>

@include('components.changePasswordModal', ['route' => 'updatePasswordRestaurant'])
@include('components.changeImageProfileModal', ['route' => 'updateProfileImageRestaurant'])

{{-- Change Address Modal --}}
<div id="ubahAlamatModal" class="hidden">
    <div class="fixed z-50 inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white rounded-lg w-96 p-6">
            <h2 class="text-xl font-semibold mb-4">Ubah Alamat</h2>
            <form id="ubahAlamatForm" action="{{ route('updateAddress') }}" method="POST">
                @csrf
                @method('PUT')
                <!-- Nama Jalan -->
                <div class="mb-4">
                    <label for="nama_jalan" class="block text-primary font-medium">Nama Jalan</label>
                    <input id="nama_jalan" name="nama_jalan" type="text" value="{{ Auth::guard('restaurant')->user()->street }}" class="w-full p-2 border border-gray-300 rounded-md">
                </div>
                <!-- Kecamatan -->
                <div class="mb-4">
                    <label for="kecamatan" class="block text-primary font-medium">Kecamatan</label>
                    <input id="kecamatan" name="kecamatan" type="text" value="{{ Auth::guard('restaurant')->user()->subdistrict }}" class="w-full p-2 border border-gray-300 rounded-md">
                </div>
                <!-- Kota -->
                <div class="mb-4">
                    <label for="kota" class="block text-primary font-medium">Kota</label>
                    <input id="kota" name="kota" type="text" value="{{ Auth::guard('restaurant')->user()->city }}" class="w-full p-2 border border-gray-300 rounded-md">
                </div>
                <!-- Provinsi -->
                <div class="mb-4">
                    <label for="provinsi" class="block text-primary font-medium">Provinsi</label>
                    <input id="provinsi" name="provinsi" type="text" value="{{ Auth::guard('restaurant')->user()->province }}" class="w-full p-2 border border-gray-300 rounded-md">
                </div>
                <!-- Kode Pos -->
                <div class="mb-4">
                    <label for="kode_pos" class="block text-primary font-medium">Kode Pos</label>
                    <input id="kode_pos" name="kode_pos" type="text" value="{{ Auth::guard('restaurant')->user()->postal_code }}" class="w-full p-2 border border-gray-300 rounded-md">
                </div>
                <!-- Pesan Wajib -->
                <p id="error-message" class="text-red-500 text-sm mt-2 hidden">* Semua field wajib diisi</p>
                <!-- Action Buttons -->
                <div class="flex justify-end space-x-4 mt-4">
                    <button type="button" class="bg-gray-300 hover:bg-white border hover:border-primary text-primary py-2 px-4 rounded-md transition-all duration-500" id="closeModalBtn">Batal</button>
                    <button type="submit" class="bg-accent hover:bg-white border hover:border-accent hover:text-accent text-white py-2 px-4 rounded-md transition-all duration-500">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Change Description Modal --}}
<div id="desc-modal" tabindex="-1" aria-hidden="true" class="z-50 hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-lg max-h-full min-h-[80vh]">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex justify-between items-center p-4 md:p-5 border-b rounded-t gap-5">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    @lang('changePasswordModal.title')
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="desc-modal">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5 flex flex-col justify-center" method="POST" action="{{ route('updateDescription') }}">
                @csrf
                @method('PUT')
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            @lang('restaurantProfile.description_label')
                        </label>
                        <textarea 
                            name="description" 
                            id="description" 
                            rows="4" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-accent focus:border-accent block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                            placeholder="@lang('restaurantProfile.description_placeholder')" 
                            required>{{ Auth::guard('restaurant')->user()->description }}</textarea>
                    </div>
                </div>
                <button type="submit" class="text-accent inline-flex items-center justify-center border border-accent hover:border-accent hover:text-white hover:bg-accent focus:ring-4 focus:outline-none focus:ring-accent-selected font-medium rounded-lg text-sm px-5 py-2.5 my-8 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 transition-all duration-500">
                    @lang('restaurantProfile.submit')
                </button>
            </form>
        </div>
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
        } else {
            console.error('Element not found!');
        }
    });

</script>

