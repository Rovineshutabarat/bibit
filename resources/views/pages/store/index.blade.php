@extends('layouts.store')

@section('title', 'Store Page')

@section('store-content')
<section>
    <!-- Slider Section -->
    <x-store.carousel />

    <!-- Category Section -->
    <section class="w-full bg-white py-16">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-8">Kategori Unggulan</h2>
            <div class="grid grid-cols-5 gap-x-7">
                @foreach ($categories as $category)
                    <div class="relative overflow-hidden rounded-xl cursor-pointer group h-44">
                        <img src="{{url('/' . $category->image)}}"
                            class="absolute inset-0 object-cover bg-center transition-all h-44 duration-300 group-hover:brightness-50">
                        </img>

                        <div
                            class="absolute inset-0 flex items-end justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <span class="text-white text-sm font-medium text-center bg-black/50 px-3 py-7 w-full rounded">
                                {{$category->name}}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Product Section -->
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
                                        <img src="https://img.icons8.com/fluency/48/star--v1.png" alt="star"
                                            class="w-4 h-4" />
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
                                        <input type="hidden" name="quantity" value="1">
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


    <x-store.popular-product />


    <!-- Benefit Section -->
    <section class="w-full bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-8 text-center">Mengapa Memilih Kami?</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="flex flex-col items-center text-center p-6 bg-white rounded-xl">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-4">
                        <img src="https://img.icons8.com/fluency/48/delivery.png" alt="delivery" class="w-8 h-8" />
                    </div>
                    <h3 class="font-semibold text-gray-800 mb-2">Pengiriman Cepat</h3>
                    <p class="text-sm text-gray-500">Pesanan Anda akan sampai dalam waktu 24 jam</p>
                </div>
                <div class="flex flex-col items-center text-center p-6 bg-white rounded-xl">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-4">
                        <img src="https://img.icons8.com/fluency/48/guarantee.png" alt="guarantee" class="w-8 h-8" />
                    </div>
                    <h3 class="font-semibold text-gray-800 mb-2">Kualitas Terjamin</h3>
                    <p class="text-sm text-gray-500">Produk fresh langsung dari petani</p>
                </div>
                <div class="flex flex-col items-center text-center p-6 bg-white rounded-xl">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-4">
                        <img src="https://img.icons8.com/fluency/48/wallet.png" alt="wallet" class="w-8 h-8" />
                    </div>
                    <h3 class="font-semibold text-gray-800 mb-2">Harga Terbaik</h3>
                    <p class="text-sm text-gray-500">Harga langsung dari petani tanpa perantara</p>
                </div>
                <div class="flex flex-col items-center text-center p-6 bg-white rounded-xl">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-4">
                        <img src="https://img.icons8.com/fluency/48/customer-support.png" alt="support"
                            class="w-8 h-8" />
                    </div>
                    <h3 class="font-semibold text-gray-800 mb-2">Layanan 24/7</h3>
                    <p class="text-sm text-gray-500">Tim support siap membantu Anda</p>
                </div>
            </div>
        </div>
    </section>
</section>
@endsection