<section class="w-full bg-gray-50 py-16">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-bold text-gray-800">Produk Terbaru</h2>
            <a href="#" class="text-green-600 hover:text-green-700 font-medium text-sm">Lihat Semua</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($products as $product)
                <a href="{{route("store.product.detail", ['id' => $product->id])}}" class="group cursor-pointer">
                    <div
                        class="relative bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-300">
                        <div class="aspect-[4/3] overflow-hidden relative">
                            <img src="{{ url('/' . $product->image) }}" alt="{{ $product->name }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" />
                        </div>
                        <div class="absolute top-4 left-4">
                            <span
                                class="inline-flex items-center px-3 py-1.5 rounded-lg text-xs font-medium bg-white/80 backdrop-blur-sm text-green-600">
                                {{ $product->category->name }}
                            </span>
                        </div>

                        <div class="p-5 py-3">
                            <div class="flex items-center justify-between ">
                                <h3
                                    class="font-semibold text-gray-800 text-lg group-hover:text-green-600 transition-colors line-clamp-1">
                                    {{ $product->name }}
                                </h3>
                                <div class="flex items-center bg-gray-50 px-2 rounded-lg">
                                    <img src="https://img.icons8.com/fluency/48/star--v1.png" alt="star" class="w-4 h-4" />
                                    <span class="text-sm text-gray-600 ml-1">4,5</span>
                                </div>
                            </div>

                            <p class="text-sm text-gray-500 mb-1">Tersedia {{ $product->stock }}</p>

                            <div class="flex items-center space-x-4 mb-1">
                                <div class="flex items-center text-sm text-gray-500">
                                    <img src="https://img.icons8.com/external-outline-andi-nur-abdillah/64/737373/external-Sign-Sold-real-estate-(outline)-outline-andi-nur-abdillah.png"
                                        alt="shopping-bag" class="w-4 h-4 mr-1.5" />
                                    <span>20 Terjual</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-500">
                                    <img src="https://img.icons8.com/material-outlined/50/737373/visible.png" alt="eye"
                                        class="w-4 h-4 mr-1.5" />
                                    <span>45x Dilihat</span>
                                </div>
                            </div>

                            <div class="flex items-center justify-between">
                                <div>
                                    <div class="flex items-center">
                                        <p class="text-xl font-bold text-gray-900">
                                            Rp {{ number_format($product->price, 0, ',', '.') }}
                                        </p>
                                        <span class="ml-2 text-xs font-medium text-green-600 bg-green-100 px-2 rounded">
                                            -70%
                                        </span>
                                    </div>
                                </div>

                                <form action="{{ route('cart.store', ['id' => $product->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="flex items-center p-2 justify-center rounded-full bg-green-500 hover:bg-green-600 transition-colors group disabled:opacity-50 disabled:cursor-not-allowed">
                                        <img src="https://img.icons8.com/sf-black-filled/64/FFFFFF/shopping-cart.png"
                                            alt="add" class="size-5 group-hover:opacity-80 transition-opacity" />
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>