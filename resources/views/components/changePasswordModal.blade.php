<!-- Change Password Modal -->
<div id="crud-modal" tabindex="-1" aria-hidden="true" class="z-50 hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-lg max-h-full min-h-[80vh]">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex justify-between items-center p-4 md:p-5 border-b rounded-t gap-5">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    @lang('changePasswordModal.title')
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5 flex flex-col justify-center" method="POST" action="{{ route($route) }}">
                @csrf
                @method('PUT')
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="old_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">@lang('changePasswordModal.old_password')</label>
                        <input type="password" name="old_password" id="old_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-accent focus:border-accent block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="@lang('changePasswordModal.old_password')" required="">
                    </div>
                    <div class="col-span-2">
                        <label for="new_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">@lang('changePasswordModal.new_password')</label>
                        <input type="password" name="new_password" id="new_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-accent focus:border-accent block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="@lang('changePasswordModal.new_password')" required="">
                    </div>
                    <div class="col-span-2">
                        <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">@lang('changePasswordModal.confirm_password')</label>
                        <input type="password" name="confirm_password" id="confirm_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-accent focus:border-accent block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="@lang('changePasswordModal.confirm_password')" required="">
                    </div>
                </div>
                <button type="submit" class="text-accent inline-flex items-center justify-center border border-accent hover:border-accent hover:text-white hover:bg-accent focus:ring-4 focus:outline-none focus:ring-accent-selected font-medium rounded-lg text-sm px-5 py-2.5 my-8 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 transition-all duration-500">
                    @lang('changePasswordModal.submit')
                </button>
            </form>
        </div>
    </div>
</div> 
</div>
