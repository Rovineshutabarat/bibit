@extends('layouts.main')

@section('title', 'Homepage')

@section('main-content')
<!-- Header/Hero Section -->
<header class="bg-green-50 py-16">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mb-8 md:mb-0">
                <h1 class="text-4xl md:text-5xl font-bold text-green-800 mb-4">
                    Bibit & Pupuk Berkualitas untuk Hasil Terbaik
                </h1>
                <p class="text-gray-600 mb-6">
                    Tingkatkan hasil panen Anda dengan produk berkualitas dari AgroMart.
                    Kami menyediakan berbagai jenis bibit unggul dan pupuk terpercaya.
                </p>
            </div>
            <div class="md:w-1/2">
                <img src="gambar/kebun.jpg" alt="Pertanian" class="rounded-lg shadow-lg">
            </div>
        </div>
    </div>
</header>



<!-- Kategori Produk -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12">Kategori Produk</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Bibit -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <img src="gambar/bibit.jpg" alt="Bibit" class="w-full h-48 object-cover rounded-lg mb-4">
                <h3 class="text-xl font-semibold mb-2">Bibit</h3>
                <p class="text-gray-600">Berbagai jenis bibit unggul untuk hasil maksimal</p>
            </div>

            <!-- Pupuk Organik -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <img src="gambar/pupuk.jpeg" alt="Pupuk Organik" class="w-full h-48 object-cover rounded-lg mb-4">
                <h3 class="text-xl font-semibold mb-2">Pupuk Organik</h3>
                <p class="text-gray-600">Pupuk alami untuk pertanian berkelanjutan</p>
            </div>

            <!-- Pupuk NPK -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <img src="gambar/pupuknp.jpg" alt="Pupuk NPK" class="w-full h-48 object-cover rounded-lg mb-4">
                <h3 class="text-xl font-semibold mb-2">Pupuk NPK</h3>
                <p class="text-gray-600">Nutrisi lengkap untuk pertumbuhan optimal</p>
            </div>

            <!-- Peralatan -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <img src="gambar/alat.jpg" alt="Peralatan" class="w-full h-48 object-cover rounded-lg mb-4">
                <h3 class="text-xl font-semibold mb-2">Peralatan</h3>
                <p class="text-gray-600">Perlengkapan pendukung berkebun</p>
            </div>
        </div>
    </div>
</section>


<!-- Keunggulan -->
<section class="bg-green-50 py-16">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12">Mengapa Memilih Kami?</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="bg-green-600 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                        </path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2">Kualitas Terjamin</h3>
                <p class="text-gray-600">Produk berkualitas tinggi dengan sertifikasi resmi</p>
            </div>
            <div class="text-center">
                <div class="bg-green-600 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2">Pengiriman Cepat</h3>
                <p class="text-gray-600">Layanan pengiriman ke seluruh Indonesia</p>
            </div>
            <div class="text-center">
                <div class="bg-green-600 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536">
                        </path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2">Konsultasi Gratis</h3>
                <p class="text-gray-600">Tim ahli siap membantu Anda</p>
            </div>
        </div>
    </div>
</section>
@endsection