@extends('layouts.store')

@section('title', 'Shopping Cart')

@section('store-content')
<div class="font-sans max-w-7xl max-md:max-w-xl mx-auto bg-gray-50 mt-10 p-12 rounded-lg">

    <div class="grid md:grid-cols-3 gap-8">
        <div class="md:col-span-2 space-y-4">
            @foreach ($cart_products as $cart_product)
                <div class="grid grid-cols-3 items-start gap-4">
                    <div class="col-span-2 flex items-start gap-4">
                        <a href="{{url('/' . $cart_product->product->image)}}" target="_blank"
                            class="w-28 h-28 max-sm:w-24 max-sm:h-24 cursor-pointer shrink-0 bg-gray-100 p-2 rounded-md">
                            <img src='{{url('/' . $cart_product->product->image)}}'
                                class="w-full h-full rounded-md object-cover" />
                        </a>

                        <div class="flex flex-col">
                            <h3 class="text-base font-bold text-gray-800">{{$cart_product->product->name}}</h3>
                            <p class="text-xs font-semibold text-gray-500 mt-0.5">{{$cart_product->product->category->name}}
                            </p>

                            <form action="{{route("cart.delete", ['id' => $cart_product->product->id])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="mt-6 font-semibold text-red-500 text-xs flex items-center gap-1 shrink-0">
                                    <img src="https://img.icons8.com/material-outlined/50/FA5252/trash.png" alt=""
                                        class="size-4">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="ml-auto">
                        <h4 class="text-lg max-sm:text-base font-bold text-gray-800">
                            Rp.{{$cart_product->product->price * $cart_product->quantity}}</h4>

                        <div
                            class="mt-6 flex items-center px-3 py-1.5 border border-gray-300 text-gray-800 text-xs outline-none bg-transparent rounded-md">
                            <form action="{{route("cart.store", ['id' => $cart_product->product->id])}}" method="post">
                                @csrf
                                <input type="hidden" name="quantity" value="-1">
                                <button type="submit" {{$cart_product->quantity <= 1 ? 'disabled' : '' }}>
                                    <img src="https://img.icons8.com/ios-glyphs/30/minus-math.png" alt="" class="size-3">
                                </button>
                            </form>
                            <span class="mx-3 font-bold">{{$cart_product->quantity}}</span>
                            <form action="{{route("cart.store", ['id' => $cart_product->product->id])}}" method="post">
                                @csrf
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit">
                                    <img src="https://img.icons8.com/ios-glyphs/30/plus-math.png" alt="" class="size-3">
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="bg-gray-100 rounded-md p-4 h-max">
            <h3 class="text-lg max-sm:text-base font-bold text-gray-800 border-b border-gray-300 pb-2">Order Summary
            </h3>

            <ul class="text-gray-800 mt-6 space-y-3">
                <!-- Subtotal -->
                <li class="flex flex-wrap gap-4 text-sm">
                    Subtotal
                    <span class="ml-auto font-bold">Rp. {{ number_format($total, 0, ',', '.') }}</span>
                </li>

                <!-- Shipping -->
                @php
                    $shipping = 20000; 
                @endphp
                <li class="flex flex-wrap gap-4 text-sm">
                    Shipping
                    <span class="ml-auto font-bold">Rp. {{ number_format($shipping, 0, ',', '.') }}</span>
                </li>

                <!-- Tax -->
                @php
                    $tax = $total * 0.1; 
                @endphp
                <li class="flex flex-wrap gap-4 text-sm">
                    Tax
                    <span class="ml-auto font-bold">Rp. {{ number_format($tax, 0, ',', '.') }}</span>
                </li>

                <hr class="border-gray-300" />

                <!-- Total -->
                @php
                    $grand_total = $total + $shipping + $tax;
                @endphp
                <li class="flex flex-wrap gap-4 text-sm font-bold">
                    Total
                    <span class="ml-auto">Rp. {{ number_format($grand_total, 0, ',', '.') }}</span>
                </li>
            </ul>


            <div class="mt-5">
                <h1 class="text-sm font-semibold">Payment Method</h1>
                <div class="grid gap-3 grid-cols-3 mt-3">
                    <div
                        class="flex flex-col items-center gap-y-1 border border-slate-700 justify-center bg-gray-200 cursor-pointer px-3 py-2 rounded-lg">
                        <img src="https://img.icons8.com/material-rounded/24/cash-euro.png" alt="money"
                            class="size-7" />
                        <h1 class="text-slate-700 text-xs">Cash</h1>
                    </div>
                    <button disabled
                        class="flex flex-col disabled:bg-gray-100 items-center gap-y-1 justify-center bg-gray-200 cursor-not-allowed px-3 py-2 rounded-lg opacity-50">
                        <img src="https://img.icons8.com/ios/50/credit-card-front.png" alt="money" class="size-7" />
                        <h1 class="text-slate-700 text-xs">Transfer</h1>
                    </button>
                    <button disabled
                        class="flex flex-col disabled:bg-gray-100 items-center gap-y-1 justify-center bg-gray-200 cursor-not-allowed px-3 py-2 rounded-lg opacity-50">
                        <img src="https://img.icons8.com/external-creatype-outline-colourcreatype/64/external-barcode-business-and-finance-creatype-outline-colourcreatype.png"
                            alt="money" class="size-7" />
                        <h1 class="text-slate-700 text-xs">Qris</h1>
                    </button>
                </div>
            </div>
            <div class="mt-6 space-y-3">
                <button type="button"
                    class="text-sm px-4 py-2.5 w-full font-semibold tracking-wide bg-gray-800 hover:bg-gray-900 text-white rounded-md">Checkout</button>
                <button type="button"
                    class="text-sm px-4 py-2.5 w-full font-semibold tracking-wide bg-transparent text-gray-800 border border-gray-300 rounded-md">
                    <a href="{{ route('store.index') }}">Continue Shopping</a>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection