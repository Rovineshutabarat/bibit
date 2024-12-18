<!-- resources/views/admin/dashboard.blade.php -->
@extends('app')

@section('title', 'Dashboard - AgroMart adminpage')

@section('app-content')
    <div class="flex min-h-screen">
        <x-adminpage.sidebar/>
        <div class="flex-1">
            <x-adminpage.navbar/>
            <main class="p-8 px-10">
                @yield('adminpage-content')
            </main>
        </div>
    </div>
@endsection
