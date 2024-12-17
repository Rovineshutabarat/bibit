@extends('layouts.store')

@section('title', 'Product Detail')

@section('store-content')
<div class="font-sans p-8 tracking-wide max-w-screen-xl mt-5 mx-auto">
    <div class="grid items-start grid-cols-1 lg:grid-cols-2 gap-10">
        <div class="space-y-4 text-center lg:sticky top-16">
            <div class="p-4 flex items-center sm:h-[380px] rounded-lg">
                <img src="{{ url('/' . $product->image) }}" alt="Product" class="w-full h-full object-cover" />
            </div>
        </div>

        <div class="max-w-xl">
            <div>
                <h2 class="text-2xl font-extrabold text-gray-800">{{ $product->name }}</h2>
                <p class="text-sm text-gray-600 mt-2">{{ $product->category->name }}</p>
            </div>

            <div class="flex space-x-7 mt-4">
                <div class="flex space-x-1">
                    <svg class="w-5 fill-yellow-400" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                    </svg>
                    <svg class="w-5 fill-yellow-400" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                    </svg>
                    <svg class="w-5 fill-yellow-400" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                    </svg>
                    <svg class="w-5 fill-yellow-400" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                    </svg>
                    <svg class="w-5 fill-[#CED5D8]" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                    </svg>
                </div>

                <div class="flex justify-center items-center gap-x-2">
                    <div class="flex items-center py-1 bg-gray-100 text-xs text-gray-800 rounded-lg px-3">
                        <img src="https://img.icons8.com/sf-regular/50/4D4D4D/rating.png" alt="review.png"
                            class="size-5 mr-1">
                        <span>120 Ulasan</span>
                    </div>
                    @if ($product->total_view > 0)
                        <div class="flex items-center py-1 bg-gray-100 text-xs text-gray-800 rounded-lg px-3">
                            <img src="https://img.icons8.com/ios/100/4D4D4D/visible.png" alt="views.png"
                                class="size-5 mr-1">
                            <span>{{$product->total_view}}x Dilihat</span>
                        </div>
                    @endif
                </div>
            </div>

            <div class="mt-4">
                <h3 class="text-gray-800 text-4xl font-bold">Rp.{{ $product->price }}</h3>
            </div>

            <div class="mt-8">
                <h3 class="text-xl font-bold text-gray-800">Pilih Jumlah</h3>

                <div class="mt-4 flex items-center">
                    <button id="decrease" onclick="subtract_quantity()"
                        class="w-10 h-10 border hover:border-green-400 font-semibold text-lg rounded-lg flex items-center justify-center">-</button>
                    <span id="quantity" class="mx-4 text-lg" id="quantity">1</span>
                    <button id="increase" onclick="add_quantity()"
                        class="w-10 h-10 border hover:border-green-400 font-semibold text-lg rounded-lg flex items-center justify-center">+</button>
                </div>
            </div>

            <div class="flex flex-wrap gap-4 mt-8">


                <form action="{{ route('order.store', ['id' => $product->id]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="quantity" id="order-quantity-input" value="1">
                    <button type="submit"
                        class="min-w-[200px] px-4 py-2.5 border bg-green-500 hover:bg-green-600 text-white text-sm font-semibold rounded-lg">Buy
                        now</button>
                </form>

                <form action="{{ route('cart.store', ['id' => $product->id]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="quantity" id="cart-quantity-input" value="1">
                    <button type="submit"
                        class="min-w-[200px] px-4 py-2.5 border border-green-400 bg-transparent hover:bg-gray-50 text-gray-800 text-sm font-semibold rounded-lg">
                        Add to cart
                    </button>
                </form>

            </div>

            <div class="mt-8">
                <ul class="flex border-b">
                    <li onclick="renderDescription()"
                        class="text-gray-800 font-bold text-sm bg-gray-100 py-3 px-8 border-b-2 border-green-400 cursor-pointer transition-all">
                        Description</li>
                    <li onclick="renderReview()"
                        class="text-gray-600 font-bold text-sm hover:bg-gray-100 py-3 px-8 cursor-pointer transition-all">
                        Reviews</li>
                </ul>

                <div id="description_section" class="mt-4">
                    <h3 class="text-lg font-bold text-gray-800">Product Description</h3>
                    <p class="text-sm text-gray-600 mt-4">{{ $product->description }}</p>
                </div>
                <div id="review_section" class="mt-4 hidden">
                    <div class="bg-white text-gray-900">
                        <div class="max-w-5xl mx-auto">
                            <!-- Customer Reviews Section -->
                            <div class="border-b pb-6">
                                <h2 class="text-xl font-semibold mb-2">Ulasan & Rating Pengguna</h2>
                                <div class="flex items-center space-x-2 mt-4 mb-2">
                                    <div class="flex justify-center items-center">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <svg class="w-6 h-6 {{ $i <= 5 ? 'text-yellow-400' : 'text-gray-300' }} fill-current"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                            </svg>
                                        @endfor
                                    </div>
                                    <p class="text-gray-600">(4.7 out of 5)</p>
                                </div>
                                <p class="text-gray-600 text-sm my-2">3,498 Total Ulasan</p>
                                <div class="space-y-2 mt-4">
                                    @php
                                        $ratings = [
                                            ['stars' => 5, 'count' => 2388, 'percentage' => 80],
                                            ['stars' => 4, 'count' => 785, 'percentage' => 25],
                                            ['stars' => 3, 'count' => 239, 'percentage' => 10],
                                            ['stars' => 2, 'count' => 18, 'percentage' => 1],
                                            ['stars' => 1, 'count' => 472, 'percentage' => 15]
                                        ];
                                    @endphp

                                    @foreach ($ratings as $rating)
                                        <div class="flex items-center space-x-4">
                                            <p class="text-gray-800 text-sm w-16">{{ $rating['stars'] }} stars</p>
                                            <div class="flex-grow bg-gray-200 h-2 rounded">
                                                <div class="bg-gray-800 h-2 rounded"
                                                    style="width: {{ $rating['percentage'] }}%"></div>
                                            </div>
                                            <span class="text-sm text-gray-600">{{ $rating['count'] }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="mt-6 pt-6 border-t">
                                <div class="flex items-start bg-gray-50 shadow-sm p-5 rounded-lg space-x-10">
                                    <div class="flex-shrink-0">
                                        <div class="flex flex-col items-center">
                                            <div class="flex mb-2">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 24 24">
                                                        <path
                                                            d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                                    </svg>
                                                @endfor
                                            </div>
                                            <p class="font-medium text-sm">Bessie Cooper</p>
                                            <p class="text-xs text-gray-500">March 14, 2021</p>
                                        </div>
                                    </div>
                                    <div class="flex-grow">
                                        <h3 class="text-lg font-semibold">Great product, smooth purchase</h3>
                                        <p class="text-slate-500 text-sm mt-2">
                                            Almost completed building my replacement website and very pleased with the
                                            result.
                                            Although the customization is great the theme's features and Customer
                                            Support have also been great...
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        const quantity = document.getElementById('quantity');
        const cart_quantity = document.getElementById('cart-quantity-input')
        const order_quantity = document.getElementById('order-quantity-input')
        const review_section = document.getElementById('review_section');
        const description_section = document.getElementById('description_section');

        function renderDescription() {
            review_section.classList.add('hidden');
            description_section.classList.remove('hidden');

            document.querySelector('[onclick="renderDescription()"]').classList.add('border-green-400', 'bg-gray-100');
            document.querySelector('[onclick="renderReview()"]').classList.remove('border-green-400', 'bg-gray-100');
        }

        function renderReview() {
            review_section.classList.remove('hidden');
            description_section.classList.add('hidden');

            document.querySelector('[onclick="renderReview()"]').classList.add('border-green-400', 'bg-gray-100', 'border-b-2');
            document.querySelector('[onclick="renderDescription()"]').classList.remove('border-green-400', 'bg-gray-100');
        }

        function add_quantity() {
            quantity.innerText = parseInt(quantity.innerText) + 1;
            setInputQuantity()
        }

        function subtract_quantity() {
            if (quantity.innerText <= 1) {
                quantity.innerText = 1;
                setInputQuantity()
            } else {
                quantity.innerText = parseInt(quantity.innerText) - 1;
                setInputQuantity()
            }
        }

        function setInputQuantity() {
            cart_quantity.value = parseInt(quantity.innerText);
            order_quantity.value = parseInt(quantity.innerText);
        }
    </script>
@endpush