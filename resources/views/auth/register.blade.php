<!-- resources/views/admin/dashboard.blade.php -->
@extends('app')

@section('title', 'Register')

@section('app-content')
    <div class="font-[sans-serif]">
        <div class="grid lg:grid-cols-2 md:grid-cols-2 items-center gap-4">
            <div class="max-md:order-1 h-screen min-h-full">
                <img src="https://readymadeui.com/image-3.webp" class="w-full h-full object-cover" alt="login-image" />
            </div>

            <form class="max-w-xl w-full p-6 mx-auto" action="{{ route('auth.register') }}" method="POST">
                @csrf
                <div class="mb-12">
                    <h3 class="text-gray-800 text-4xl font-extrabold">Sign up</h3>
                    <p class="text-gray-800 text-sm mt-6">Already have an account <a href="{{ route('auth.login') }}"
                            class="text-blue-600 font-semibold hover:underline ml-1 whitespace-nowrap">Login here</a></p>
                </div>

                <div>
                    <label class="text-gray-800 text-sm block mb-2">Username</label>
                    <div class="relative flex items-center">
                        <input name="username" type="text" required
                            class="w-full text-sm text-gray-800 border-b border-gray-300 focus:border-blue-600 px-2 py-3 outline-none"
                            placeholder="Enter username" />
                        <img src="https://img.icons8.com/ios-glyphs/30/737373/person-male.png" alt="username.png"
                            class="size-5 -translate-x-5">
                    </div>
                </div>

                <div class="mt-8">
                    <label class="text-gray-800 text-sm block mb-2">Email</label>
                    <div class="relative flex items-center">
                        <input name="email" type="email" required
                            class="w-full text-sm text-gray-800 border-b border-gray-300 focus:border-blue-600 px-2 py-3 outline-none"
                            placeholder="Enter email" />
                        <img src="https://img.icons8.com/ios-glyphs/30/737373/new-post.png" alt="email.png"
                            class="size-5 -translate-x-5">
                    </div>
                </div>

                <div class="mt-8">
                    <label class="text-gray-800 text-sm block mb-2">Password</label>
                    <div class="relative flex items-center">
                        <input name="password" type="password" required
                            class="w-full text-sm text-gray-800 border-b border-gray-300 focus:border-blue-600 px-2 py-3 outline-none"
                            placeholder="Enter password" />
                        <img src="https://img.icons8.com/ios-filled/50/737373/password.png" alt="password.png"
                            class="size-5 -translate-x-5">
                    </div>
                </div>

                <div class="flex flex-wrap items-center justify-between gap-4 mt-6">
                    <div class="flex items-center">
                        <input id="remember-me" name="remember-me" type="checkbox"
                            class="h-4 w-4 shrink-0 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" />
                        <label for="remember-me" class="ml-3 block text-sm text-gray-800">
                            Remember me
                        </label>
                    </div>
                    <div>
                        <a href="jajvascript:void(0);" class="text-blue-600 font-semibold text-sm hover:underline">
                            Forgot Password?
                        </a>
                    </div>
                </div>

                <div class="mt-12">
                    <button type="submit"
                        class="w-full py-2.5 px-4 text-sm tracking-wide rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
                        Sign up
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
