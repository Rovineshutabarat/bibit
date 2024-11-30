@extends('layouts.store')

@section('title', 'Profile')

@section('store-content')
<div class="bg-white w-full flex flex-col gap-5 px-3 md:px-16 lg:px-28 md:flex-row text-[#161931]">
    <aside class="hidden py-4 md:w-1/3 lg:w-1/4 md:block">
        <div class="sticky flex flex-col gap-2 p-4 text-sm border-r border-green-100 top-12">

            <h2 class="pl-3 mb-4 text-2xl font-semibold">Settings</h2>

            <a href="#" class="flex items-center px-3 py-2.5 font-bold bg-white  border rounded-full">
                Pubic Profile
            </a>
            <a href="#" class="flex items-center px-3 py-2.5 font-semibold hover:border hover:rounded-full">
                Account Settings
            </a>
        </div>
    </aside>
    <main class="w-full min-h-screen py-1 md:w-2/3 lg:w-3/4">
        <div class="p-2 md:p-4">
            <div class="w-full px-6 pb-8 mt-8 sm:max-w-xl sm:rounded-lg">
                <h2 class="pl-6 text-2xl font-bold sm:text-xl">Public Profile</h2>

                <div class="grid max-w-2xl mx-auto mt-8">
                    <div class="flex flex-col items-center space-y-5 sm:flex-row sm:space-y-0">

                        <img class="object-cover w-40 h-40 p-1 rounded-full ring-2 ring-green-300"
                            src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fGZhY2V8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=500&q=60"
                            alt="Bordered avatar">

                        <div class="flex flex-col space-y-5 sm:ml-8">
                            <button type="button"
                                class="py-3.5 px-7 text-base font-medium text-white focus:outline-none bg-green-600 rounded-lg border border-indigo-200 hover:bg-green-700 focus:z-10 focus:ring-4 focus:ring-indigo-200 ">
                                Change picture
                            </button>
                            <button type="button"
                                class="py-3.5 px-7 text-base font-medium focus:outline-none bg-white rounded-lg border border-green-200 hover:bg-green-100 hover:text-gree-500 focus:z-10 focus:ring-4 focus:ring-green-200 ">
                                Delete picture
                            </button>
                        </div>
                    </div>

                    <form action="{{route('main.update.profile', ['id' => auth()->user()->id])}}" method="post"
                        class="items-center mt-8 sm:mt-14 ">
                        @csrf
                        <div class="mb-2 sm:mb-6">
                            <label for="username" class="block mb-2 text-sm font-medium">Your
                                Username</label>
                            <input type="text" name="username" value="{{$user->username}}" id="username"
                                class="border text-sm rounded-lg block w-full p-2.5 ">
                        </div>
                        <div class="mb-2 sm:mb-6">
                            <label for="email" class="block mb-2 text-sm font-medium">Your
                                email</label>
                            <input type="email" name="email" value="{{$user->email}}" id="email"
                                class="border text-sm rounded-lg block w-full p-2.5 ">
                        </div>
                        <div class="mb-2 sm:mb-6">
                            <label for="password" class="block mb-2 text-sm font-medium">Your
                                email</label>
                            <input type="password" name="password" value="{{$user->password}}" id="password"
                                class="border text-sm rounded-lg block w-full p-2.5 ">
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="text-white bg-green-700  hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Save</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection