<div class="relative w-64 z-[60] bg-white border-e border-gray-200 pt-7 pb-10 overflow-y-auto"
    x-data="{ openUsers: false, openAccount: false }">
    <div class="px-6">
        <a class="flex-none font-semibold text-md text-black focus:outline-none focus:opacity-80" href="#"
            aria-label="Brand">Toko Bunga Uda Sepen</a>
    </div>
    <nav class="p-6 w-full flex flex-col flex-wrap">
        <ul class="space-y-1.5">
            <li>
                <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100
                {{ request()->routeIs('') ? 'bg-gray-200' : '' }}" href="{{ route('adminpage.dashboard.index') }}">
                    <img src="https://img.icons8.com/metro/50/4D4D4D/home.png" alt="dashboard.png" class="size-5">
                    Dashboard
                </a>
            </li>

            <li>
                <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100
                {{ request()->routeIs('adminpage.product*') ? 'bg-gray-200' : '' }}"
                    href="{{ route('adminpage.product.index') }}">
                    <img src="https://img.icons8.com/material/24/4D4D4D/product--v1.png" alt="product.png"
                        class="size-5">
                    Produk
                </a>
            </li>

            <li>
                <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100
                {{ request()->routeIs('adminpage.category*') ? 'bg-gray-200' : '' }}"
                    href="{{ route('adminpage.category.index') }}">
                    <img src="https://img.icons8.com/ios-filled/50/4D4D4D/categorize.png" alt="category.png"
                        class="size-5">
                    Kategori
                </a>
            </li>

            <li>
                <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100
                {{ request()->routeIs('') ? 'bg-gray-200' : '' }}" href="{{ route('adminpage.listorder.index') }}">
                    <img src="https://img.icons8.com/ios-glyphs/30/fast-cart.png" alt="dashboard.png" class="size-5">
                    Pesanan
                </a>
            </li>

            <li>
                <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100
                {{ request()->routeIs('adminpage.feedback.index') ? 'bg-gray-200' : '' }}"
                    href="{{ route('adminpage.feedback.index') }}">
                    <img src="https://img.icons8.com/external-tanah-basah-glyph-tanah-basah/48/737373/external-review-food-delivery-tanah-basah-glyph-tanah-basah.png"
                        alt="category.png" class="size-5">
                    Feedback
                </a>
            </li>

            <li>
                <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100
                {{ request()->routeIs('auth.logout') ? 'bg-gray-200' : '' }}" href="{{ route('auth.logout') }}">
                    <img src="https://img.icons8.com/metro/50/737373/shutdown.png" alt="logout.png" class="size-5">
                    Keluar
                </a>
            </li>

            {{-- <li> --}}
                {{-- <button type="button" @click="openAccount = !openAccount" --}} {{--
                    class="w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100">
                    --}}
                    {{-- <img src="https://img.icons8.com/ios-filled/50/737373/diversity.png" --}} {{--
                        alt="account.png" class="size-5"> --}}
                    {{-- Category --}}
                    {{-- <svg :class="openAccount ? 'block' : 'hidden'" class="ms-auto size-4 text-gray-600" --}} {{--
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" --}}
                        {{-- stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"> --}}
                        {{--
                        <path d="m6 9 6 6 6-6" /> --}}
                        {{--
                    </svg> --}}
                    {{-- <svg :class="openAccount ? 'hidden' : 'block'" class="ms-auto size-4 text-gray-600" --}} {{--
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" --}}
                        {{-- stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"> --}}
                        {{--
                        <path d="m18 15-6-6-6 6" /> --}}
                        {{--
                    </svg> --}}
                    {{-- </button> --}}

                {{-- <div x-show="openAccount" class="w-full overflow-hidden transition-[height] duration-300"> --}}
                    {{-- <ul class="pt-2 ps-2"> --}}
                        {{-- <li> --}}
                            {{-- <a
                                class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100"
                                --}} {{-- href="#"> --}}
                                {{-- Link 1 --}}
                                {{-- </a> --}}
                            {{-- </li> --}}
                        {{-- <li> --}}
                            {{-- <a
                                class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100"
                                --}} {{-- href="#"> --}}
                                {{-- Link 2 --}}
                                {{-- </a> --}}
                            {{-- </li> --}}
                        {{-- <li> --}}
                            {{-- <a
                                class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100"
                                --}} {{-- href="#"> --}}
                                {{-- Link 3 --}}
                                {{-- </a> --}}
                            {{-- </li> --}}
                        {{-- </ul> --}}
                    {{-- </div> --}}
                {{-- </li> --}}
        </ul>
    </nav>
</div>