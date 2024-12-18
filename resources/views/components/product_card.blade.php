<div class="py-5 max-w-sm bg-white border border-gray-200 rounded-lg shadow flex flex-col items-center">
    <div class="flex flex-col items-center">
        <button {{ (Auth::guard('customer')->check()) ? '' : 'disabled' }} onclick="show(this)" data-product-id="{{ $product->id }}" class="flex flex-col items-center">
            <div class="p-3">
                <img class="rounded-xl w-32 hover:scale-110 transition-all duration-500" src="{{ $product->image }}" alt="product image" />
            </div>
        </button>
        <div class="text-center">
            <h5 class="text-lg font-semibold tracking-tight text-black dark:text-white">{{ $product->name }}</h5>
            <div class="text-center">
                <span class="text-sm font-bold text-black/60 dark:text-white">Rp {{ number_format($product->price, 0, ',', '.') }},00</span>
            </div>
        </div>

        <form class="hidden" action="{{ route('addToCart') }}" method="POST" id="inputQuantity-{{ $product->id }}">
            @csrf
            <div class="flex flex-col items-center gap-2">
                <div class="flex justify-center mt-3">
                    <input name="quantity" type="number" value="1" min="1" class="w-1/2 text-center border rounded-lg text-sm">
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                </div>
                <button type="submit" class="bg-tertiary text-white text-xs p-2 rounded-lg hover:text-tertiary hover:bg-transparent border hover:border-tertiary transition-all duration-500">
                    @lang('product_card.btn_add_to_cart')
                </button>
            </div>
        </form>
    </div>
</div>


<script>
    function show(button) {
        const productId = button.getAttribute('data-product-id');
        const hidden = document.getElementById(`inputQuantity-${productId}`);
        
        if (hidden) {
            hidden.classList.toggle('hidden');
        } else {
            console.error(`Element with ID inputQuantity-${productId} not found`);
        }
    }

</script>
