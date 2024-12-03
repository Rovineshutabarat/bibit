<nav
    class="max-w-screen-xl px-4 mx-auto bg-white bg-opacity-90 sticky top-3 shadow lg:px-8 lg:py-3 backdrop-blur-lg backdrop-saturate-150 z-40">
    <div class="flex justify-between items-center py-2">
        <h1 class="text-[18px] font-semibold">Toko bunga uda sepen</h1>
        <ul class="flex justify-center items-center gap-x-7">
            <li class="text-gray-600">
                <a href="{{ route('main.homepage') }}">Beranda</a>
            </li>
            <li class="text-gray-600">
                <a href="{{ route('store.index') }}">Belanja</a>
            </li>
            <li class="text-gray-600">
                <a href="{{route('main.about.us')}}">Tentang Kami</a>
            </li>
            <li class="text-gray-600">
                <a href="{{route('main.contact.us')}}">Kontak Kami</a>
            </li>
        </ul>

        <div class="flex justify-center items-center gap-x-7">
            @if (Auth::check())
                <a class="w-full rounded-3xl max-w-sm min-w-[230px] relative border border-slate-400">
                    @csrf
                    <input id="search" name="search"
                        class="w-full pr-11 h-10 pl-3 py-2 rounded-3xl bg-transparent text-slate-700 text-sm focus:outline-none focus:border-slate-400 hover:border-slate-400 shadow-sm focus:shadow-md"
                        placeholder="Cari produk..." onkeydown="handle_search_keydown(event)" />
                    <div class="absolute h-8 w-8 right-1 top-1 my-auto px-2 flex items-center rounded " type="submit">
                        <img src="https://img.icons8.com/ios-filled/50/4D4D4D/search.png" alt="">
                    </div>
                </a>
                <a href="{{route("cart.index")}}" class="relative w-full">
                    <img src="https://img.icons8.com/material-outlined/50/4D4D4D/shopping-cart.png" alt="profile.png"
                        class="size-6 object-cover">
                    <span
                        class="absolute -top-2 -right-1 inline-flex items-center justify-center w-4 h-4 text-xs font-bold text-white bg-red-500 rounded-full">{{$user_cart_count}}</span>
                </a>
                <div class="relative w-full cursor-pointer border rounded-full border-slate-600 p-[1px]">
                    <img id="userDropdownBtn"
                        src="{{$user->image ? $user->image : 'https://img.icons8.com/metro/50/4D4D4D/guest-male.png'}}"
                        alt="profile.png" class="size-6 object-cover rounded-full">
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
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const userDropdownBtn = document.getElementById('userDropdownBtn');
        const userDropdown = document.getElementById('userDropdown');

        userDropdownBtn.addEventListener('click', function (e) {
            e.stopPropagation();
            userDropdown.classList.toggle('hidden');
        });

        document.addEventListener('click', function () {
            userDropdown.classList.add('hidden');
        });

        userDropdown.addEventListener('click', function (e) {
            e.stopPropagation();
        });
    });

    function handle_search_keydown(event) {
        const search = document.getElementById("search").value.trim()
        if (event.key == 'Enter') {
            redirectToSearch(search)
        }
    }

    function redirectToSearch(query) {
        const encodedQuery = encodeURIComponent(query);
        const url = `http://127.0.0.1:8000/store?search=${encodedQuery}`;
        window.location.href = url;
    }
</script>