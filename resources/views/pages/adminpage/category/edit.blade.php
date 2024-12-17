<!-- resources/views/admin/dashboard.blade.php -->
@extends('layouts.adminpage')

@section('title', 'Dashboard - Edit Category')

@section('adminpage-content')
<form action="{{route('adminpage.category.update', ['id' => $category->id])}}" method="POST"
    enctype="multipart/form-data">
    @csrf
    <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-[18px] font-semibold text-gray-900">Edit Kategori</h2>
            <p class="mt-1 text-sm/6 text-gray-600">Silahkan masukkan data kategori.</p>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-4">
                    <label for="name" class="block text-sm/6 font-medium text-gray-900">Nama</label>
                    <div class="mt-2">
                        <div
                            class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                            <input type="text" name="name" autocomplete="name" value="{{$category->name}}"
                                class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm/6"
                                placeholder="Masukkan Nama Kategori">
                        </div>
                    </div>
                </div>

                <div class="col-span-full">
                    <label for="description" class="block text-sm/6 font-medium text-gray-900">Deskripsi</label>
                    <div class="mt-2">
                        <textarea placeholder="Masukkan Deskripsi Dari Kategori." name="description" rows="3"
                            class="block px-3 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">{{$category->description}}
                            </textarea>
                    </div>
                    <p class="mt-3 text-sm/6 text-gray-600"></p>
                </div>

                <div class="col-span-full">
                    <label for="image" class="block text-sm/6 font-medium text-gray-900">Gambar</label>
                    <div class="mt-2">
                        <div class="w-full mb-5">
                            <label for="image"
                                class="flex w-full cursor-pointer appearance-none items-center justify-center rounded-md border-2 border-dashed border-gray-200 p-6 transition-all hover:border-primary-300">
                                <div class="space-y-1 text-center">
                                    <div
                                        class="mx-auto inline-flex h-10 w-10 items-center justify-center rounded-full bg-gray-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-gray-500">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" />
                                        </svg>
                                    </div>
                                    <div class="text-gray-600">
                                        <span class="font-medium text-primary-500 hover:text-primary-700">Click to
                                            upload</span>
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
                            <img id="preview-image" src="{{ url('/' . $category->image) }}" alt="Preview"
                                class="mt-2 object-cover size-24">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
        <button type="button" onclick="window.history.back()"
            class="text-sm/6 font-semibold text-gray-900">Batal</button>
        <button type="submit"
            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Update
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
                }

                reader.readAsDataURL(file);
            } else {
                fileNameDisplay.textContent = '';
            }
        }
    </script>
@endpush