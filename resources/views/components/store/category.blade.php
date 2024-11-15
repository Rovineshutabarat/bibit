<section class="w-full bg-white py-16">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-8">Kategori Unggulan</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
            @foreach (range(1, 6) as $category)
                <div
                    class="flex flex-col items-center p-4 rounded-xl bg-gray-50 hover:bg-gray-100 transition-colors cursor-pointer">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-3">
                        <img src="https://organiccenter.id/wp-content/uploads/2019/05/03-1.jpg" alt="category"
                            class="w-8 h-8" />
                    </div>
                    <span class="text-sm font-medium text-gray-700">Sayuran Segar</span>
                </div>
            @endforeach
        </div>
    </div>
</section>
