@extends('layouts.adminpage')

@section('title', 'Dashboard - Create Category')

@section('adminpage-content')
    <form action="{{ route('adminpage.category.store') }}" method="POST">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-[18px] font-semibold text-gray-900">Tambah Kategori</h2>
                <p class="mt-1 text-sm/6 text-gray-600">Silahkan masukkan data kategori.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="name" class="block text-sm/6 font-medium text-gray-900">Nama</label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" name="name" autocomplete="name"
                                       class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm/6"
                                       placeholder="Masukkan Nama Kategori" value="{{ old('name') }}">
                            </div>
                            @error('name')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label for="description" class="block text-sm/6 font-medium text-gray-900">Deskripsi</label>
                        <div class="mt-2">
                            <textarea placeholder="Masukkan Deskripsi Dari Kategori." name="description" rows="5"
                                      class="px-3 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">{{ old('description') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" onclick="window.history.back()" class="text-sm/6 font-semibold text-gray-900">Batal</button>
            <button type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Simpan
            </button>
        </div>
    </form>
@endsection
