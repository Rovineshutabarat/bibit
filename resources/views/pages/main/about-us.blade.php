@extends('layouts.store')

@section('title', 'About Us')

@section('store-content')
<div class="sm:flex items-center max-w-screen-xl mx-auto">
    <div class="sm:w-1/2 p-10">
        <div class="image object-center text-center">
            <img src="{{url('/gambar/Business decisions-bro.svg')}}">
        </div>
    </div>
    <div class="sm:w-5/12 p-5">
        <div class="text">
            <span class="text-gray-500 border-b-2 border-green-600 uppercase">About us</span>
            <h2 class="my-4 font-bold text-3xl  sm:text-4xl ">About <span class="text-green-600">Uda Sepen</span>
            </h2>
            <p class="text-gray-700">
            Selamat datang di Web Toko Bibit Uda Sepen, platform terpercaya untuk memenuhi kebutuhan bibit berkualitas tinggi bagi petani, pekebun, dan pecinta tanaman di seluruh Indonesia. Kami hadir dengan komitmen untuk menyediakan bibit unggul yang mendukung pertumbuhan tanaman sehat dan produktif. <br>

            Dengan jaringan mitra petani dan penangkar bibit terpercaya, kami memastikan setiap produk yang Anda pilih memiliki kualitas terbaik dan siap tanam. Selain itu, kami juga menawarkan panduan perawatan dan tips menanam yang membantu Anda mencapai hasil panen maksimal.

            Kami percaya bahwa bibit yang baik adalah awal dari keberhasilan pertanian. Oleh karena itu, kami selalu berusaha menghadirkan produk yang terjamin mutu dan ketahanannya. Mari tumbuhkan masa depan hijau bersama kami!</p> <br>

            <p>Visi Kami:
            Mendukung pertanian berkelanjutan dengan menyediakan bibit berkualitas dan layanan terbaik.</p> <br>

            <p>Misi Kami:

            Menyediakan bibit unggul yang sesuai dengan kebutuhan pasar. <br>
            Memberikan edukasi dan layanan konsultasi bagi pelanggan. <br>
            Mendorong pertumbuhan ekonomi petani dan pelaku agribisnis lokal. <br>
            Terima kasih telah mempercayakan kebutuhan bibit Anda kepada kami! <br>
            </p>
        </div>
    </div>
</div>
@endsection