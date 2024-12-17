<nav class="bg-green-500 text-white">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center">
                <span class="text-xl font-bold">Toko Uda Sepen</span>
            </div>
            <div class="hidden md:flex space-x-8">
                <a href=""
                    class="hover:text-green-200 @if(request()->routeIs('home')) text-green-200 @endif">Beranda</a>
                <a href="{{ route('auth.login') }}" class="hover:text-green-200">Login</a>
                <a href="{{ route('store.index') }}" class="hover:text-green-200 @if(request()->routeIs('store.index')) text-green-200 @endif">Store</a>
            </div>
        </div>
    </div>
</nav>