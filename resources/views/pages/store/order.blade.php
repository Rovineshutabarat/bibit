@extends('layouts.store')

@section('title', 'Profile')

@section('store-content')
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col md:flex-row gap-6">
        <x-store.profile-sidebar />

        <div class="w-full md:w-2/3 lg:w-3/4">
            <div class="bg-white shadow-sm rounded-lg overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100">
                    <h1 class="text-xl font-semibold text-gray-800">Pesanan Saya</h1>
                </div>

                @forelse ($orders as $order)
                    @foreach ($order->orderDetails as $order_detail)
                        <div class="p-6">
                            <div class="flex items-center space-x-6 bg-gray-50 p-5 rounded-lg">
                                <img src="{{ $order_detail->product->image ?? 'https://tailwindui.com/plus/img/ecommerce-images/confirmation-page-03-product-01.jpg' }}"
                                    alt="Product" class="w-24 h-24 object-cover rounded-md">

                                <div class="flex-1 grid grid-cols-2 gap-4">
                                    <div>
                                        <p class="text-sm text-gray-500">Produk</p>
                                        <p class="font-medium text-gray-800">
                                            {{ $order_detail->product->name ?? 'Produk Tidak Tersedia' }}
                                        </p>
                                    </div>

                                    <div>
                                        <p class="text-sm text-gray-500">Harga</p>
                                        <p class="font-medium text-green-600">
                                            Rp {{ number_format($order_detail->total_amount ?? 0, 0, ',', '.') }}
                                        </p>
                                    </div>

                                    <div>
                                        <p class="text-sm text-gray-500">Pengiriman</p>
                                        <p class="text-gray-700 text-sm">
                                            {{auth()->user()->address}}
                                        </p>
                                    </div>

                                    <div>
                                        <p class="text-sm text-gray-500">Status</p>
                                        <span class="inline-block px-2 py-1 text-xs text-green-800 bg-green-100 rounded-full">
                                            {{ $order->status }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="flex justify-end space-x-3 mt-6">
                                <button
                                    class="px-4 py-2 text-sm text-white bg-red-500 rounded-md hover:bg-red-600 transition-colors">
                                    Batalkan
                                </button>
                                <button
                                    class="px-4 py-2 text-sm text-white bg-green-500 rounded-md hover:bg-green-600 transition-colors">
                                    Pesanan Diterima
                                </button>
                            </div>
                        </div>
                    @endforeach
                @empty
                    <div class="p-6 text-center text-gray-500">
                        Tidak ada pesanan saat ini
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection