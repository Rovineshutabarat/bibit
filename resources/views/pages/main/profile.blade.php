@extends('layouts.store')

@section('title', 'Profile')

@section('store-content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
        <div class="p-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">User Profile</h2>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Name
                </label>
                <p class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight">
                    {{ $user->username }}
                </p>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    Email
                </label>
                <p class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight">
                    {{ $user->email }}
                </p>
            </div>

            <div class="flex items-center justify-between">
                <a href=""
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Edit Profile
                </a>
            </div>
        </div>
    </div>
</div>
@endsection