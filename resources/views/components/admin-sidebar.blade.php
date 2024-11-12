<aside class="bg-green-800 text-white w-64 min-h-screen hidden md:block">
    <div class="p-4">
        <h1 class="text-2xl font-bold">AgroMart Admin</h1>
    </div>
    <nav class="mt-4">
        <a href=""
           class="block py-2.5 px-4 hover:bg-green-700 {{ request()->routeIs('admin.dashboard') ? 'bg-green-700' : '' }}">
            <i class="fas fa-home w-6"></i>
            Dashboard
        </a>
        <div x-data="{ open: false }">
            <button @click="open = !open"
                    class="w-full flex items-center justify-between py-2.5 px-4 hover:bg-green-700">
                <div>
                    <i class="fas fa-box w-6"></i>
                    Produk
                </div>
                <svg :class="{'rotate-180': open}" class="w-4 h-4 transition-transform duration-200" fill="none"
                     stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <div x-show="open" class="bg-green-900">
                <a class="block py-2 px-4 pl-12 hover:bg-green-700">
                    Daftar Produk
                </a>
                <a class="block py-2 px-4 pl-12 hover:bg-green-700">
                    Tambah Produk
                </a>
                <a href="" class="block py-2 px-4 pl-12 hover:bg-green-700">
                    Kategori
                </a>
            </div>
        </div>

        <a href="" class="block py-2.5 px-4 hover:bg-green-700">
            <i class="fas fa-shopping-cart w-6"></i>
            Pesanan
        </a>

        <a href="" class="block py-2.5 px-4 hover:bg-green-700">
            <i class="fas fa-users w-6"></i>
            Pelanggan
        </a>

        <a href="" class="block py-2.5 px-4 hover:bg-green-700">
            <i class="fas fa-chart-bar w-6"></i>
            Laporan
        </a>

        <a href="" class="block py-2.5 px-4 hover:bg-green-700">
            <i class="fas fa-cog w-6"></i>
            Pengaturan
        </a>
    </nav>
</aside>
