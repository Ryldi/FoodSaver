<div class="flex gap-2 flex-col p-4 bg-neutral border border-black rounded-lg shadow">
    <div class="flex flex-row gap-4">
        <div class="w-1/2">
            <img class="object-cover rounded-xl w-full h-auto" src="{{ asset('img/product/jco/alcapone.png') }}" alt="product image" />
        </div>
        <div class="flex flex-col justify-between">
            <div class="flex flex-col gap-2">
                <h5 class="text-xl font-semibold tracking-tight text-primary">Alcapone</h5>
                <p class="text-lg font-medium text-primary">Rp 6.000,00</p>
                <p class="text-lg font-medium text-primary">2 Pcs = Rp 12.000,00</p>
            </div>
            <button class="bg-carmine text-white w-1/2 text-xs p-2 rounded-xl hover:text-carmine hover:bg-transparent border hover:border-carmine transition-all duration-500">
                Hapus
            </button>
        </div>
    </div>
    <div class="flex flex-row items-center mt-4">
        <input type="number" value="0" class="w-1/2 text-center border rounded-lg text-sm">
        <input id="vue-checkbox-list" type="checkbox" value="" class="ml-auto w-8 h-8 text-primary bg-gray-100 border-gray-300 rounded focus:ring-primary">
    </div>
</div>
