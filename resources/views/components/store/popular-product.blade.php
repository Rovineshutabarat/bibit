<section class="w-full bg-white py-16">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-bold text-gray-800">Produk Terpopuler</h2>
            <a href="#" class="text-green-600 hover:text-green-700 font-medium text-sm">Lihat Semua</a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach (range(1, 3) as $product)
                <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-xl">
                    <div class="w-24 h-24 rounded-xl overflow-hidden flex-shrink-0">
                        <img src="http://localhost:8000/images/product/1731643182_images%20(1).jpeg" alt="product"
                            class="w-full h-full object-cover" />
                    </div>
                    <div class="flex-1">
                        <h3 class="font-semibold text-gray-800 mb-1">Produk Terpopuler</h3>
                        <p class="text-sm text-gray-500 mb-2">Terjual 100+</p>
                        <p class="font-bold text-green-600">Rp 50.000</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
