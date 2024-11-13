<!-- resources/views/admin/dashboard.blade.php -->
@extends('layouts.adminpage')

@section('title', 'Dashboard - Product')

@section('adminpage-content')
    <form action="{{route('adminpage.product.update' , ['id' => $product->id])}}" method="POST">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-[18px] font-semibold text-gray-900">Tambah Produk</h2>
                <p class="mt-1 text-sm/6 text-gray-600">Silahkan masukkan data produk.</p>

                <div class="mt-10 flex-col flex gap-y-8">
                    <div class="sm:col-span-4">
                        <label for="name" class="block text-sm/6 font-medium text-gray-900">Nama</label>
                        <div class="mt-2">
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" name="name" autocomplete="name"
                                       class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm/6"
                                       placeholder="Masukkan Nama Produk" value="{{ $product->name }}">
                            </div>
                            @error('name')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label for="description" class="block text-sm/6 font-medium text-gray-900">Deskripsi</label>
                        <div class="mt-2">
                            <textarea placeholder="Masukkan Deskripsi Dari Produk." name="description" rows="5"
                                      class="px-3 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6"
                            >{{ $product->name }}</textarea>
                        </div>
                    </div>

                    <div class="flex justify-center items-center gap-x-12">
                        <div class="sm:col-span-4 w-full">
                            <label for="price" class="block text-sm/6 font-medium text-gray-900">Harga</label>
                            <div class="mt-2">
                                <div
                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
                                    <input type="number" name="price" autocomplete="price"
                                           class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm/6"
                                           placeholder="Masukkan Harga Produk" value="{{ $product->price }}">
                                </div>
                                @error('price')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="sm:col-span-4 w-full">
                            <label for="quantity" class="block text-sm/6 font-medium text-gray-900">Stok</label>
                            <div class="mt-2">
                                <div
                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
                                    <input type="number" name="quantity" autocomplete="quantity"
                                           class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm/6"
                                           placeholder="Masukkan Stok Produk" value="{{ $product->quantity }}">
                                </div>
                                @error('quantity')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="sm:col-span-4 w-full">
                        <label for="category" class="block text-sm/6 font-medium text-gray-900">Kategori</label>
                        <div class="mt-2">
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
                                <select name="category_id"
                                        class="block w-full border border-gray-300 rounded-md py-2 pl-3 pr-10 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600 sm:text-sm">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $category->id == $product->category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('category')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="image" class="block text-sm/6 font-medium text-gray-900">Gambar</label>
                        <div class="mt-2">
                            <div class="w-full mb-5">
                                <label
                                    for="image"
                                    class="flex w-full cursor-pointer appearance-none items-center justify-center rounded-md border-2 border-dashed border-gray-200 p-6 transition-all hover:border-primary-300"
                                >
                                    <div class="space-y-1 text-center">
                                        <div
                                            class="mx-auto inline-flex h-10 w-10 items-center justify-center rounded-full bg-gray-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                 stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-gray-500">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z"/>
                                            </svg>
                                        </div>
                                        <div class="text-gray-600">
                                            <span class="font-medium text-primary-500 hover:text-primary-700">Click to upload</span>
                                            or drag and drop
                                        </div>
                                        <p class="text-sm text-gray-500">SVG, PNG, JPG or GIF (max 2MB)</p>
                                    </div>
                                </label>
                                <input id="image" name="image" type="file" class="sr-only" accept="image/*"
                                       onchange="updateFileName()">
                            </div>
                            @error('image')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                            <div class="flex flex-col items-center w-48">
                                <div id="file-name" class="text-gray-700 text-sm mt-2 bg-gray-200 w-fit"></div>
                                <img id="preview-image" src="" alt="Preview" class="mt-2 hidden object-cover size-24">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" onclick="window.history.back()" class="text-sm/6 font-semibold text-gray-900">Batal
            </button>
            <button type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Simpan
            </button>
        </div>
    </form>
@endsection


@push('scripts')
    <script>
        function updateFileName() {
            const input = document.getElementById('image');
            const fileNameDisplay = document.getElementById('file-name');
            const previewImage = document.getElementById('preview-image');

            if (input.files.length > 0) {
                const fileName = input.files[0].name;
                fileNameDisplay.textContent = `${fileName}`;


                const file = input.files[0];
                const reader = new FileReader();

                reader.onload = function (e) {
                    previewImage.src = e.target.result;
                    previewImage.classList.remove('hidden');
                }

                reader.readAsDataURL(file);
            } else {
                fileNameDisplay.textContent = '';
                previewImage.classList.add('hidden');
            }
        }
    </script>
@endpush
