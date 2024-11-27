@extends('layouts.store')

@section('title', 'Contact Us')

@section('store-content')
<div class="grid sm:grid-cols-2 items-start gap-16 p-4 mx-auto max-w-7xl mt-16 bg-white font-[sans-serif]">
    <div>
        <h1 class="text-gray-800 text-3xl font-extrabold">Contact Us</h1>
        <p class="text-sm text-gray-500 mt-4">Have some big idea or brand to develop and need help? Then reach out we'd
            love to hear about your project and provide help.</p>

        <div class="mt-12">
            <h2 class="text-gray-800 text-base font-bold">Email</h2>
            <ul class="mt-4">
                <li class="flex items-center">
                    <div class="bg-[#e6e6e6cf] h-10 w-10 rounded-full flex items-center justify-center shrink-0">
                        <img src="https://img.icons8.com/ios/50/new-post.png" alt="Email Icon" width="20" height="20" />
                    </div>
                    <a href="javascript:void(0)" class="text-sm ml-4">
                        <small class="block">Mail</small>
                        <strong>udasepen@example.com</strong>
                    </a>
                </li>
            </ul>
        </div>

        <div class="mt-12">
            <h2 class="text-gray-800 text-base font-bold">Socials</h2>

            <ul class="flex mt-4 space-x-4">
                <li class="bg-[#e6e6e6cf] h-10 w-10 rounded-full flex items-center justify-center shrink-0">
                    <a href="javascript:void(0)">
                        <img src="https://img.icons8.com/fluency/50/facebook-new.png" alt="Facebook Icon" width="20"
                            height="20" />
                    </a>
                </li>
                <li class="bg-[#e6e6e6cf] h-10 w-10 rounded-full flex items-center justify-center shrink-0">
                    <a href="javascript:void(0)">
                        <img src="https://img.icons8.com/color/50/linkedin.png" alt="LinkedIn Icon" width="20"
                            height="20" />
                    </a>
                </li>
                <li class="bg-[#e6e6e6cf] h-10 w-10 rounded-full flex items-center justify-center shrink-0">
                    <a href="javascript:void(0)">
                        <img src="https://img.icons8.com/fluency/50/instagram-new.png" alt="Instagram Icon" width="20"
                            height="20" />
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <form class="ml-auto space-y-4">
        <input type='text' placeholder='Name'
            class="w-full rounded-md py-3 px-4 bg-gray-100 text-gray-800 text-sm outline-green-500 focus:bg-transparent" />
        <input type='email' placeholder='Email'
            class="w-full rounded-md py-3 px-4 bg-gray-100 text-gray-800 text-sm outline-green-500 focus:bg-transparent" />
        <input type='text' placeholder='Subject'
            class="w-full rounded-md py-3 px-4 bg-gray-100 text-gray-800 text-sm outline-green-500 focus:bg-transparent" />
        <textarea placeholder='Message' rows="6"
            class="w-full rounded-md px-4 bg-gray-100 text-gray-800 text-sm pt-3 outline-green-500 focus:bg-transparent"></textarea>
        <button type='button'
            class="text-white bg-green-500 hover:bg-blue-600 tracking-wide rounded-md text-sm px-4 py-3 w-full !mt-6">Send</button>
    </form>
</div>
@endsection