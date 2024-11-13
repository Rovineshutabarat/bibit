<!-- resources/views/admin/dashboard.blade.php -->
@extends('app')

@section('title', 'Dashboard - AgroMart adminpage')

@section('app-content')
    <x-store-navbar />
    <x-store-carousel />
    
    <section id="Projects"
        class="w-fit mx-auto mt-24 max-w-screen-xl grid grid-cols-1 lg:grid-cols-4 md:grid-cols-2 justify-items-center justify-center gap-y-20 gap-x-14 mb-5">

        @foreach ($products as $product)
            <div class="w-72 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
                <a href="#">
                    <img src="{{ url('/' . $product->image) }}" alt="Product" class="h-64 w-72 object-cover rounded-t-xl" />
                    <div class="px-4 py-3 w-72">
                        <span class="text-gray-400 mr-3 uppercase text-xs">{{ $product->category->name }}</span>
                        <p class="text-lg font-bold text-black truncate block capitalize">{{ $product->name }}</p>
                        <div class="flex items-center justify-between">
                            <p class="text-lg font-semibold text-black cursor-auto my-3">Rp.{{ $product->price }}</p>
                            <div class="bg-slate-200 p-2 rounded-full">
                                <img src="https://img.icons8.com/sf-regular-filled/48/4D4D4D/shopping-cart.png"
                                    alt="cart.png" class="size-7">
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </section>

    <x-store-footer />
@endsection
