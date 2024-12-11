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
                    <div class="bg-gray-50 p-5 rounded-lg mb-12">
                        <div class="my-2 mb-5">
                            @if ($order->status == "paid")
                                <h1 class="bg-green-500 py-3 font-semibold text-sm text-white px-3 rounded-lg">Pesanan Telah
                                    Dibayar</h1>
                            @elseif($order->status == "shipping")
                                <h1 class="bg-blue-500 py-3 font-semibold text-sm text-white px-3 rounded-lg">Pesanan Anda
                                    Sedang Dikirim</h1>
                            @elseif($order->status == "unpaid")
                                <h1 class="bg-red-500 py-3 font-semibold text-sm text-white px-3 rounded-lg">Pesanan Belum
                                    Dibayar</h1>
                            @elseif($order->status == "canceled")
                                <h1 class="bg-red-500 py-3 font-semibold text-sm text-white px-3 rounded-lg">Pesanan Dibatalkan
                                </h1>
                            @elseif($order->status == "complete")
                                <h1 class="bg-green-600 py-3 font-semibold text-sm text-white px-3 rounded-lg">Pesanan Telah
                                    Diterima</h1>
                            @endif
                        </div>

                        <div class="flex">
                            <div class="flex-1">
                                @foreach ($order->orderDetails as $order_detail)
                                    <div class="flex items-center space-x-6 mb-4">
                                        <img src="{{ $order_detail->product->image ?? 'https://tailwindui.com/plus/img/ecommerce-images/confirmation-page-03-product-01.jpg' }}"
                                            alt="Product" class="size-20 object-cover rounded-md">

                                        <div class="flex-1 grid grid-cols-3 gap-4">
                                            <div>
                                                <p class="text-sm text-gray-500">Produk</p>
                                                <p class="font-medium text-gray-800">
                                                    {{ $order_detail->product->name ?? 'Produk Tidak Tersedia' }}
                                                </p>
                                            </div>

                                            <div>
                                                <p class="text-sm text-gray-500">Jumlah</p>
                                                <p class="font-medium text-gray-500">
                                                    {{ $order_detail->quantity }}
                                                </p>
                                            </div>

                                            <div>
                                                <p class="text-sm text-gray-500">Harga</p>
                                                <p class="font-medium text-gray-500">
                                                    {{ $order_detail->product->price }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="w-5/12">
                                <div class="bg-gray-100 rounded-md p-4 h-max">
                                    <h3 class="text-lg max-sm:text-base font-bold text-gray-800 pb-2">
                                        Detail Pesanan
                                    </h3>

                                    <hr class="border-gray-300 my-4 mt-1" />

                                    <div class="text-gray-800 mt-4 grid grid-cols-2 gap-x-6 gap-y-3">
                                        <div>
                                            <p class="text-sm text-gray-500">Nama Pelanggan</p>
                                            <p class="font-medium">{{ $order->user->username ?? 'Tidak Tersedia' }}</p>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-500">Nomor Telepon</p>
                                            <p class="font-medium">{{ $order->user->contact ?? 'Tidak Tersedia' }}</p>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-500">Alamat</p>
                                            <p class="font-medium">{{ $order->user->address ?? 'Alamat Tidak Tersedia' }}
                                            </p>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-500">Metode Pembayaran</p>
                                            <p class="font-medium">{{$order->payment_method}}</p>
                                        </div>
                                    </div>


                                    <hr class="border-gray-300 my-4" />

                                    <ul class="text-gray-800 space-y-3">
                                        <li class="flex flex-wrap gap-4 text-sm">
                                            Subtotal Produk
                                            <span id="subtotal" class="ml-auto font-bold">
                                                Rp {{ number_format($order->total_amount ?? 0, 0, ',', '.') }}
                                            </span>
                                        </li>

                                        <li class="flex flex-wrap gap-4 text-sm">
                                            Biaya Pengiriman
                                            <span class="ml-auto font-bold">
                                                Rp.20.000
                                            </span>
                                        </li>

                                        <hr class="border-gray-300" />

                                        <li class="flex flex-wrap gap-4 text-sm font-bold">
                                            Total
                                            <span id="total" class="ml-auto">
                                                Rp
                                                {{ number_format(($order->total_amount ?? 0) + ($order->shipping_cost ?? 0), 0, ',', '.') }}
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end mt-6">
                            <div class="flex items-center space-x-3">
                                @if ($order->status == "unpaid")
                                    <form action="{{route('order.update', ['id' => $order->id])}}" method="post">
                                        @csrf
                                        <input type="hidden" name="status" value="canceled">
                                        <button type="submit"
                                            class="px-4 py-2 text-sm text-white bg-red-500 rounded-md hover:bg-red-600 transition-colors">
                                            Batalkan
                                        </button>
                                    </form>
                                    <button class="px-4 py-2 text-sm text-white bg-gray-400 rounded-md cursor-not-allowed"
                                        disabled>
                                        Pesanan Diterima
                                    </button>
                                @elseif ($order->status == "shipping")
                                    <button class="px-4 py-2 text-sm text-white bg-gray-400 rounded-md cursor-not-allowed"
                                        disabled>
                                        Batalkan
                                    </button>
                                    <form action="{{route('order.update', ['id' => $order->id])}}" method="post">
                                        @csrf
                                        <input type="hidden" name="status" value="complete">
                                        <button
                                            class="px-4 py-2 text-sm text-white bg-green-600 rounded-md hover:bg-green-700 transition-colors">
                                            Pesanan Diterima
                                        </button>
                                    </form>
                                @elseif ($order->status == "paid")
                                    <button class="px-4 py-2 text-sm text-white bg-gray-400 rounded-md cursor-not-allowed"
                                        disabled>
                                        Batalkan
                                    </button>
                                    <form action="{{route('order.update', ['id' => $order->id])}}" method="post">
                                        @csrf
                                        <input type="hidden" name="status" value="complete">
                                        <button
                                            class="px-4 py-2 text-sm text-white bg-green-600 rounded-md hover:bg-green-700 transition-colors">
                                            Pesanan Diterima
                                        </button>
                                    </form>
                                @elseif ($order->status == "canceled")
                                    <button class="px-4 py-2 text-sm text-white bg-gray-400 rounded-md cursor-not-allowed"
                                        disabled>
                                        Batalkan
                                    </button>
                                    <button class="px-4 py-2 text-sm text-white bg-gray-500 rounded-md cursor-not-allowed"
                                        disabled>
                                        Pesanan Dibatalkan
                                    </button>
                                @elseif ($order->status == "complete")
                                    <button class="px-4 py-2 text-sm text-white bg-gray-500 rounded-md cursor-not-allowed"
                                        disabled>
                                        Batalkan
                                    </button>
                                    <button class="px-4 py-2 text-sm text-white bg-gray-500 rounded-md cursor-not-allowed"
                                        disabled>
                                        Pesanan Selesai
                                    </button>
                                @endif
                            </div>


                        </div>
                    </div>
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