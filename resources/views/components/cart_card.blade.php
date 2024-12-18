<div class="flex gap-2 flex-col p-4 bg-neutral border border-black rounded-lg shadow">
    <div class="flex flex-col md:flex-row gap-4">
        <div class="md:w-1/2 flex justify-center">
            <img class="object-cover rounded-xl w-[60%] h-auto" src="{{ $cart->product->image }}" alt="product image" />
        </div>
        <div class="flex flex-col justify-between gap-2">
            <div class="flex flex-col gap-2">
                <h5 class="text-xl font-semibold tracking-tight text-primary">{{ $cart->product->name }}</h5>
                <p class="text-lg font-medium text-primary">Rp {{ number_format($cart->product->price, 0, ',', '.') }},00</p>
                <p class="text-lg font-medium text-primary">{{ $cart->quantity }} Pcs = Rp {{ number_format($cart->product->price * $cart->quantity, 0, ',', '.') }},00</p>
            </div>
            
        </div>
    </div>
    <div class="flex justify-between items-center mt-4">
        <form action="{{ route('updateCart') }}" method="POST" id="inputQuantity-{{ $cart->product->id }}">
            @csrf
            @method('PUT')
            <input type="hidden" name="product_id" value="{{ $cart->product->id }}">
            <div class="flex border border-gray-300 rounded-lg quantity">
                <button type="button" class="px-2 py-1 text-xl text-black border-white focus:outline-none focus:ring-2 focus:ring-accent" onclick="updateQuantity('decrease', '{{ $cart->product->id }}')">-</button>
                <input id="quantity-{{ $cart->product->id }}" name="quantity" type="number" min="1" max="{{ $cart->product->stock }}" value="{{ $cart->quantity }}" class="w-12 text-center border-none focus:ring-0"/>
                <button type="button" class="px-2 py-1 text-xl text-black border-l border-white hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-accent" onclick="updateQuantity('increase', '{{ $cart->product->id }}')">+</button>
            </div>
        </form>
        <form class="bg-carmine text-white text-xs py-2 px-5 rounded-xl hover:text-carmine hover:bg-transparent border hover:border-carmine transition-all duration-500 text-center" action="{{ route('deleteFromCart', $cart->product->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">@lang('cart_card.btn_delete')</button>
        </form>
    </div>
</div>
