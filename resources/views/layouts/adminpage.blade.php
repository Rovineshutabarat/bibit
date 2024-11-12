<!-- resources/views/admin/dashboard.blade.php -->
@extends('app')

@section('title', 'Dashboard - AgroMart adminpage')

@section('app-content')
    <div class="flex min-h-screen">
        <x-admin-sidebar/>
        <div class="flex-1">
            <x-admin-top-navbar/>
            <main class="p-6">
                @yield('adminpage-content')
            </main>
        </div>
    </div>
@endsection
