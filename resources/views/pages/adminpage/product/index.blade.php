<!-- resources/views/admin/dashboard.blade.php -->
@extends('layouts.adminpage')

@section('title', 'Dashboard - Product Page')

@section('adminpage-content')
<div class="w-full flex justify-between items-center mb-3 mt-1">
    <div>
        <h3 class="text-lg font-bold text-slate-800">Daftar Produk</h3>
        <p class="text-slate-500 text-sm">Ringkasan dari produk yang ada.</p>
    </div>

</div>

<div class="flex justify-between items-center my-2">
    <div
        class="text-sm flex gap-2 justify-center items-center px-4 py-1 bg-white text-black shadow-sm shadow-slate-400 font-semibold rounded hover:bg-slate-100">
        <img src="https://img.icons8.com/android/50/1A1A1A/plus.png" alt="category.png" class="size-3">
        <a href="{{ route('adminpage.product.create') }}">
            Tambah Produk
        </a>
    </div>
    <div class="ml-3">
        <div class="w-full max-w-sm min-w-[200px] relative">
            <div class="relative">
                <input
                    class="bg-white w-full pr-11 h-10 pl-3 py-2 bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-400 shadow-sm focus:shadow-md"
                    placeholder="Cari produk..." />
                <button class="absolute h-8 w-8 right-1 top-1 my-auto px-2 flex items-center bg-white rounded "
                    type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                        stroke="currentColor" class="w-8 h-8 text-slate-600">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="relative flex flex-col w-full h-full overflow-hidden text-gray-700 bg-white bg-clip-border">
    <table class="w-full text-center table-auto min-w-max shadow-sm">
        <thead>
            <tr class="bg-black text-white">
                <th class="p-2 border-b border-slate-300">
                    <p class="block text-sm font-normal leading-none">No</p>
                </th>
                <th class="p-2 border-b border-slate-300">
                    <p class="block text-sm font-normal leading-none">Nama</p>
                </th>
                <th class="p-2 border-b border-slate-300">
                    <p class="block text-sm font-normal leading-none">Deskripsi</p>
                </th>
                <th class="p-2 border-b border-slate-300">
                    <p class="block text-sm font-normal leading-none">Harga</p>
                </th>
                <th class="p-2 border-b border-slate-300">
                    <p class="block text-sm font-normal leading-none">Stok</p>
                </th>
                <th class="p-2 border-b border-slate-300">
                    <p class="block text-sm font-normal leading-none">Gambar</p>
                </th>
                <th class="p-2 border-b border-slate-300">
                    <p class="block text-sm font-normal leading-none">Kategori</p>
                </th>
                <th class="p-2 border-b border-slate-300">
                    <p class="block text-sm font-normal leading-none">Aksi</p>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr class="hover:bg-slate-50 border-b border-slate-200">
                    <td class="p-3">
                        <p class="block font-semibold text-sm text-slate-800">{{ $product->id }}</p>
                    </td>
                    <td class="p-3">
                        <p class="block text-sm text-slate-800">{{ $product->name }}</p>
                    </td>
                    <td class="p-3">
                        <p class="block text-sm text-slate-800">{{ $product->description }}</p>
                    </td>
                    <td class="p-3">
                        <p class="block text-sm text-slate-800">{{ $product->price }}</p>
                    </td>
                    <td class="p-3">
                        <p class="block text-sm text-slate-800">{{ $product->stock }}</p>
                    </td>
                    <td class="p-3 flex justify-center">
                        <a href="{{ url('/' . $product->image) }}" target="_blank">
                            <img src="{{ url('/' . $product->image) }}" alt="Product Image"
                                class="size-12 rounded object-cover">
                        </a>
                    </td>
                    <td class="p-3">
                        <p class="block text-sm text-slate-800">{{ $product->category->name }}</p>
                    </td>
                    <td class="">
                        <div class="flex justify-center gap-x-2">
                            <a href="{{ route('adminpage.product.edit', ['id' => $product->id]) }}">
                                <img src="https://img.icons8.com/material-outlined/50/FFFFFF/edit.png" alt="edit"
                                    class="bg-green-700 rounded p-1 size-7 cursor-pointer" />
                            </a>
                            <form id="delete-product-form-{{ $product->id }}"
                                action="{{ route('adminpage.product.delete', ['id' => $product->id]) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="confirmDelete('delete-product-form', {{ $product->id }})"
                                    class="bg-red-600 rounded p-1 size-7 cursor-pointer">
                                    <img src="https://img.icons8.com/ios-filled/50/FFFFFF/trash.png" alt="delete" />
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection