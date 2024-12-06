{{-- Profile Image Modal --}}
<div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            {{-- Form for File Upload --}}
            <div class="flex items-center justify-center w-full">
                <form method="POST" action="{{ route($route) }}" enctype="multipart/form-data" class="flex flex-col items-center justify-center w-full h-64 border-2 rounded-lg ">
                    @csrf
                    @method('PUT')
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload Profile Picture</label>
                    
                    <input class="block w-[80%] text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file" required accept=".png, .jpg, .jpeg" name="image">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG, JPG or JPEG.</p>
                    <h3 class="mb-5 text-sm font-normal text-red dark:text-gray-400 text-center">Apakah anda yakin ingin mengubah foto profil resto anda?</h3>
                    <div class="flex">
                        <button data-modal-hide="popup-modal" type="submit" class="text-white bg-accent hover:bg-white hover:text-accent border hover:border-accent font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center transition-all duration-500">
                            Ya, ubah
                        </button>
                        <button data-modal-hide="popup-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-white focus:outline-none bg-red rounded-lg border hover:bg-white hover:border-red hover:text-red  focus:z-10 focus:ring-4 transition-all duration-500">Batalkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>