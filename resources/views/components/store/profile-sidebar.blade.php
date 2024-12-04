<aside class="hidden py-4 md:w-1/3 lg:w-1/4 md:block">
    <div class="sticky flex flex-col gap-2 p-4 text-sm border-r border-green-100 top-12">

        <h2 class="pl-3 mb-4 text-2xl font-semibold">Pengaturan</h2>

        <a href="{{route('main.profile')}}" class="flex items-center px-3 py-2.5 font-semibold hover:font-bold">
            Manajemen Akun
        </a>
        <a href="{{route('cart.index')}}" class="flex items-center px-3 py-2.5 font-semibold hover:font-bold">
            Keranjang Anda
        </a>
        <a href="{{route('order.index')}}" class="flex items-center px-3 py-2.5 font-semibold hover:font-bold">
            Pesanan Anda
        </a>
        <a href="{{route('auth.logout')}}" class="flex items-center px-3 py-2.5 font-semibold hover:font-bold">
            Logout
        </a>
    </div>
</aside>