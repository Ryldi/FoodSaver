<div class="w-[15%] py-5 max-w-sm bg-white border border-gray-200 rounded-lg shadow flex flex-col items-center">
    <div class="flex flex-col items-center">
        <button onclick="show()" class="flex flex-col items-center">
            <img class="p-3 rounded-xl w-32 hover:scale-110 transition-all duration-500" src="{{ asset('img/product/jco/alcapone.png') }}" alt="product image" />
        </button>
        <div class="">
            <h5 class="text-lg font-semibold tracking-tight text-black dark:text-white">Alcapone</h5>
            <div class="flex items-center justify-between">
                <span class="text-sm font-bold text-black/60 dark:text-white">Rp 6.000,00</span>
            </div>
        </div>

        <!-- Hidden content -->
        <div class="hidden" id="inputQuantity">
            <div class="flex flex-col items-center gap-2">
                <div class="flex justify-center mt-3">
                    <input type="number" value="0" class="w-1/2 text-center border rounded-lg text-sm">
                </div>
                <button class=" bg-tertiary text-white text-xs p-2 rounded-lg hover:text-tertiary hover:bg-transparent border hover:border-tertiary transition-all duration-500">
                    Tambah ke Keranjang
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function show() {
    const hidden = document.getElementById("inputQuantity");
    hidden.classList.toggle("hidden");
    }
</script>
