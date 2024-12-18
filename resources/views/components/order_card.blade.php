<div class="w-full max-w-4xl p-4 border-2 border-gray-800 rounded-lg shadow-md bg-neutral-light">
    <div class="flex bg-neutral flex-col w-full gap-4">
        <div class="w-full border border-black rounded-lg shadow-md">
            <div class="flex">
                <div class="flex items-center justify-center w-1/4 rounded-l-lg p-4">
                    <img src="{{ ($transaction->customer->image) ? $transaction->customer->image : asset('img/avatar.png') }}" class="rounded-full w-32 h-32" alt="">
                </div>
                <div class="flex-grow flex flex-col justify-between gap-2 px-6 py-4 ">
                    <div class="flex flex-col w-full">
                        <p class="text-sm text-right text-gray-500">Order ID {{ $transaction->id }}</p>
                        <h2 class="text-2xl font-bold">{{ $transaction->customer->name }}</h2>
                    </div>
                    <hr class="border-t-2 border-black w-full" />
                    <div class="flex justify-between items-center">
                        <p class="text-xl text-green-500">{{ $transaction->status }}</p>
                        <p class="text-sm text-gray-500">{{ $transaction->created_at }}</p>
                    </div>
                    <div class="flex justify-start">
                        <a href="" class="flex items-center justify-center border hover:border-accent py-2 px-6 rounded-lg hover:text-accent hover:bg-transparent text-white bg-accent transition-all duration-500 whitespace-nowrap">
                            Detail
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>