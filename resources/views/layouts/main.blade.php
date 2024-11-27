<!-- resources/views/admin/dashboard.blade.php -->
@extends('app')

@section('title', 'Dashboard - AgroMart adminpage')

@section('app-content')
<div>
    <x-main.navbar />

    @yield('main-content')

    <x-main.footer />
</div>
@endsection