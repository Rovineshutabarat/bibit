<!-- resources/views/admin/dashboard.blade.php -->
@extends('app')

@section('title', 'Dashboard - AgroMart adminpage')

@section('app-content')
    <div>
        <x-store.navbar />

        @yield('store-content')

        <x-store.footer />
    </div>
@endsection
