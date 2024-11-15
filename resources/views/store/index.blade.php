@extends('layouts.store')

@section('title', 'Store')

@section('store-content')
    <div>
        <x-store.carousel />
        <x-store.category />
        <x-store.product :products="$products" />
        <x-store.popular-product />
        <x-store.benefit />
    </div>
@endsection
