{{-- Banner Section --}}
<div class="relative bg-white shadow-md rounded-lg overflow-hidden">
    <img src="{{ asset('img/profile/profileBanner.png') }}" alt="Banner" class="w-full h-50 object-cover">
</div>

{{-- Profile Section --}}
<div class="relative -mt-20 text-center overflow-hidden">
    <div class="relative w-32 h-32 mx-auto -mt-17">
        <img src="{{ (Auth::guard('customer')->user()->image) ? Auth::guard('customer')->user()->image : asset('img/avatar.png') }}" alt="Profile" class="w-full h-full rounded-full border-4 bg-white">
        <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="absolute bottom-0 right-0 bg-accent text-white p-2 rounded-full hover:bg-accent-hover">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 3l8 8-9 9H4v-8L13 3z"/>
            </svg>
        </button>
    </div>
    <p class="text-primary font-semibold text-3xl mt-2">{{ Auth::guard('customer')->user()->name }}</p>
    <p class="text-accent">@lang('customerProfile.joined') {{ Auth::guard('customer')->user()->created_at->format('F Y') }}</p>
</div>

<div class="min-w-96 container gap-6 w-1/2 pb-20">
    {{-- Information Card --}}
    <div class="bg-white shadow-md rounded-lg p-4 md:p-6">
        <div class="flex justify-center items-center mb-4">
            <h2 class="text-2xl font-bold">@lang('customerProfile.informasi')</h2>
        </div>
        <div class="space-y-4">
            <div class="flex justify-between items-center border-b pb-2">
                <p class="text-primary">@lang('customerProfile.full_name')</p>
                <p class="text-primary font-medium">{{ Auth::guard('customer')->user()->name }}</p>
            </div>
            <div class="flex justify-between items-center border-b pb-2">
                <p class="text-primary">@lang('customerProfile.email')</p>
                <p class="text-primary font-medium">{{ Auth::guard('customer')->user()->email }}</p>
            </div>
            <div class="flex justify-between items-center border-b pb-2">
                <p class="text-primary">@lang('customerProfile.phone_number')</p>
                <p class="text-primary font-medium">{{ Auth::guard('customer')->user()->phone }}</p>
            </div>
            <div class="flex justify-between items-center border-b pb-2">
                <p class="text-primary">@lang('customerProfile.joined')</p>
                <p class="text-primary font-medium">{{ Auth::guard('customer')->user()->created_at->format('d F Y') }}</p>
            </div>
            <div class="mt-6 flex flex-col gap-3">
                <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="w-full bg-accent text-white py-2 rounded-lg hover:bg-accent-hover">
                    @lang('customerProfile.change_password')
                </button>
                <form action="{{ route('logout') }}" method="POST" class="mt-4">
                    @csrf
                    <button type="submit" class="w-full bg-red text-white py-2 rounded-lg hover:bg-red-hover">
                        @lang('customerProfile.logout')
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@include('components.changeImageProfileModal', ['route' => 'updateProfileImageCustomer'])

@include('components.changePasswordModal', ['route' => 'updatePasswordCustomer'])
