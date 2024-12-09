<div class="py-5 max-w-sm bg-neutral border border-gray-200 rounded-lg shadow flex flex-col items-center">
    <div class="flex flex-col items-center">
        <button onclick="show(this)" data-product-id="{{ $detail->product->id }}" class="flex flex-col items-center">
            <div class="p-3">
                <img class="rounded-xl w-32 hover:scale-110 transition-all duration-500" src="{{ $detail->product->image }}" alt="product image" />
            </div>
        </button>
        <div class="text-center">
            <h5 class="text-lg font-semibold tracking-tight text-black dark:text-white">{{ $detail->product->name }}</h5>
            <div class="text-center">
                <span class="text-sm font-bold text-black/60 dark:text-white">Rp {{ number_format($detail->product->price, 0, ',', '.') }},00</span>
            </div>
            <div class="text-center">
                <span class="text-sm font-bold text-black/60 dark:text-white">{{ $detail->quantity }} {{ ($detail->quantity == 1) ? "Pc" : "Pcs" }} = Rp {{ number_format($detail->product->price * $detail->quantity, 0, ',', '.') }},00</span>
            </div>
        </div>
    </div>
</div>