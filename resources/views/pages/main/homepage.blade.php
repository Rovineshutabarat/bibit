@extends('layouts.main')

@section('title', 'Homepage')

@section('main-content')
<!-- Header/Hero Section -->
<header class="bg-gradient-to-r from-green-400 to-blue-500 py-20">
    <div class="container mx-auto px-6 md:px-12 lg:px-24">
        <div class="flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mb-8 md:mb-0">
                <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-6">
                    Bibit & Pupuk Berkualitas untuk Hasil Terbaik
                </h1>
                <p class="text-gray-200 mb-8">
                    Tingkatkan hasil panen Anda dengan produk berkualitas dari AgroMart.
                    Kami menyediakan berbagai jenis bibit unggul dan pupuk terpercaya.
                </p>
                <a href="#products" class="bg-white text-green-600 px-6 py-3 rounded-full shadow-lg hover:bg-gray-100 transition duration-300">Lihat Produk</a>
            </div>
            <div class="md:w-1/2">
                <img src="gambar/kebun.jpg" alt="Pertanian" class="rounded-lg shadow-2xl">
            </div>
        </div>
    </div>
</header>

<!-- Kategori Produk -->
<section id="products" class="py-20 bg-gray-100">
    <div class="container mx-auto px-6 md:px-12 lg:px-24">
        <h2 class="text-4xl font-bold text-center mb-16">Kategori Produk</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
            <!-- Bibit -->
            <div class="bg-white p-8 rounded-lg shadow-lg transform hover:scale-105 transition duration-300">
                <img src="gambar/bibit.jpg" alt="Bibit" class="w-full h-48 object-cover rounded-lg mb-6">
                <h3 class="text-2xl font-semibold mb-4">Bibit</h3>
                <p class="text-gray-600">Berbagai jenis bibit unggul untuk hasil maksimal</p>
            </div>

            <!-- Pupuk Organik -->
            <div class="bg-white p-8 rounded-lg shadow-lg transform hover:scale-105 transition duration-300">
                <img src="gambar/pupuk.jpeg" alt="Pupuk Organik" class="w-full h-48 object-cover rounded-lg mb-6">
                <h3 class="text-2xl font-semibold mb-4">Pupuk Organik</h3>
                <p class="text-gray-600">Pupuk alami untuk pertanian berkelanjutan</p>
            </div>

            <!-- Pupuk NPK -->
            <div class="bg-white p-8 rounded-lg shadow-lg transform hover:scale-105 transition duration-300">
                <img src="gambar/pupuknp.jpg" alt="Pupuk NPK" class="w-full h-48 object-cover rounded-lg mb-6">
                <h3 class="text-2xl font-semibold mb-4">Pupuk NPK</h3>
                <p class="text-gray-600">Nutrisi lengkap untuk pertumbuhan optimal</p>
            </div>

            <!-- Peralatan -->
            <div class="bg-white p-8 rounded-lg shadow-lg transform hover:scale-105 transition duration-300">
                <img src="gambar/alat.jpg" alt="Peralatan" class="w-full h-48 object-cover rounded-lg mb-6">
                <h3 class="text-2xl font-semibold mb-4">Peralatan</h3>
                <p class="text-gray-600">Perlengkapan pendukung berkebun</p>
            </div>
        </div>
    </div>
</section>

<!-- Keunggulan -->
<section class="bg-gradient-to-r from-green-400 to-blue-500 py-20">
    <div class="container mx-auto px-6 md:px-12 lg:px-24">
        <h2 class="text-4xl font-bold text-center text-white mb-16">Mengapa Memilih Kami?</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            <div class="text-center">
                <div class="bg-white w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg">
                    <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-semibold text-white mb-4">Kualitas Terjamin</h3>
                <p class="text-gray-200">Produk berkualitas tinggi dengan sertifikasi resmi</p>
            </div>
            <div class="text-center">
                <div class="bg-white w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg">
                    <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-semibold text-white mb-4">Pengiriman Cepat</h3>
                <p class="text-gray-200">Layanan pengiriman ke seluruh Indonesia</p>
            </div>
            <div class="text-center">
                <div class="bg-white w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg">
                    <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-semibold text-white mb-4">Konsultasi Gratis</h3>
                <p class="text-gray-200">Tim ahli siap membantu Anda</p>
            </div>
        </div>
    </div>
</section>
@endsection
