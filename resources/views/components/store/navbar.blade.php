<nav
    class="block max-w-screen-xl px-4 py-2 mx-auto bg-white bg-opacity-90 sticky top-3 shadow lg:px-8 lg:py-3 backdrop-blur-lg backdrop-saturate-150 z-40">
    <div class="container flex flex-wrap items-center justify-between mx-auto text-slate-800">
        <!-- Logo -->
        <a href="#" class="mr-4 block cursor-pointer py-1.5 text-base text-slate-800 font-semibold">
            Toko Bunga Uda Sepen
        </a>

        <!-- Desktop Menu -->
        <div class="hidden lg:block">
            <ul class="flex flex-col gap-2 mt-2 mb-4 lg:mb-0 lg:mt-0 lg:flex-row lg:items-center lg:gap-6">
                <li class="flex items-center p-1 text-sm gap-x-2 text-slate-600">
                    <a href="#" class="flex items-center">Beranda</a>
                </li>
                <li class="flex items-center p-1 text-sm gap-x-2 text-slate-600">
                    <a href="#" class="flex items-center">Produk</a>
                </li>
                <li class="flex items-center p-1 text-sm gap-x-2 text-slate-600">
                    <a href="#" class="flex items-center">Kategori</a>
                </li>
                <li class="flex items-center p-1 text-sm gap-x-2 text-slate-600">
                    <a href="#" class="flex items-center">Tentang Kami</a>
                </li>
                <li class="flex items-center p-1 text-sm gap-x-2 text-slate-600">
                    <a href="#" class="flex items-center">Kontak</a>
                </li>
            </ul>
        </div>

        <!-- Right Side Icons -->
        <div class="flex items-center gap-4">
            <!-- Search Icon -->
            <button class="p-1 text-slate-600 hover:text-slate-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </button>

            @if (Auth::check())
                <!-- User Account Icon -->
                <button class="p-1 text-slate-600 hover:text-slate-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </button>

                <!-- Shopping Cart Icon -->
                <a href="{{route("cart.index")}}" class="relative p-1 text-slate-600 hover:text-slate-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span
                        class="absolute -top-1 -right-1 inline-flex items-center justify-center w-4 h-4 text-xs font-bold text-white bg-red-500 rounded-full">{{$user_cart_count}}</span>
                </a>
            @else
                <div class="flex justify-center items-center gap-3">
                    <a href="{{route("auth.login")}}" class="px-3 py-1 rounded-lg">Login</a>
                    <a href="{{route("auth.register")}}" class="px-3 py-1 rounded-lg bg-slate-800 text-white">Register</a>
                </div>
            @endif

            <!-- Mobile Menu Button -->
            <button
                class="relative ml-auto h-6 max-h-[40px] w-6 max-w-[40px] select-none rounded-lg text-center align-middle text-xs font-medium uppercase text-inherit transition-all hover:bg-transparent focus:bg-transparent active:bg-transparent disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none lg:hidden"
                type="button">
                <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </span>
            </button>
        </div>
    </div>
</nav>