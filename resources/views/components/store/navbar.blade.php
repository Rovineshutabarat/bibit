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
                    <a href="{{ route('main.homepage') }}" class="flex items-center">Beranda</a>
                </li>
                <li class="flex items-center p-1 text-sm gap-x-2 text-slate-600">
                    <a href="{{ route('store.index') }}" class="flex items-center">Belanja</a>
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
                <img src="https://img.icons8.com/material-outlined/50/search.png" alt="" class="size-5">
            </button>

            @if (Auth::check())
                <!-- Shopping Cart Icon -->
                <a href="{{route("cart.index")}}" class="relative p-1 text-slate-600 hover:text-slate-800">
                    <img src="https://img.icons8.com/material-outlined/50/shopping-cart--v1.png" alt="" class="size-5">
                    <span
                        class="absolute -top-1 -right-1 inline-flex items-center justify-center w-4 h-4 text-xs font-bold text-white bg-red-500 rounded-full">{{$user_cart_count}}</span>
                </a>
                <!-- User Account Icon -->
                <div class="relative">
                    <button id="userDropdownBtn" class="p-1 text-slate-600 hover:text-slate-800 relative z-10">
                        <img src="https://img.icons8.com/puffy/32/user.png" alt="" class="size-5">
                    </button>

                    <div id="userDropdown"
                        class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-20 border">
                        <ul class="py-1">
                            <li>
                                <a href="{{ route('main.profile') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    Profil
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('auth.logout') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>


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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const userDropdownBtn = document.getElementById('userDropdownBtn');
        const userDropdown = document.getElementById('userDropdown');

        // Toggle dropdown
        userDropdownBtn.addEventListener('click', function (e) {
            e.stopPropagation();
            userDropdown.classList.toggle('hidden');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function () {
            userDropdown.classList.add('hidden');
        });

        // Prevent dropdown from closing when clicking inside
        userDropdown.addEventListener('click', function (e) {
            e.stopPropagation();
        });
    });
</script>