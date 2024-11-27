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
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem expedita nulla provident suscipit hic
                sapiente nihil deleniti alias laboriosam? Voluptas atque itaque similique quo? Facilis consectetur ullam
                sapiente obcaecati odio, aspernatur eaque illum beatae a dolores eum veritatis voluptas voluptatem
                molestias ratione. Sunt, voluptates, nihil facere nulla voluptate eaque rerum consequuntur unde,
                perspiciatis numquam excepturi deserunt dignissimos tempora pariatur vel. Aspernatur eligendi, error
                voluptates quis consequuntur officiis omnis minus nemo.
            </p>
        </div>
    </div>
</div>
@endsection