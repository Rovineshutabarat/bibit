@extends('layouts.store')

@section('title', 'Shopping Cart')

@section('store-content')
<div class="font-sans max-w-7xl max-md:max-w-xl mx-auto bg-gray-50 mt-10 p-12 rounded-lg">

    <div class="grid md:grid-cols-3 gap-8">
        <div class="md:col-span-2 space-y-4">
            @foreach ($cart_products as $cart_product)
                <div class="grid grid-cols-3 items-start gap-4">
                    <div class="col-span-2 flex items-start gap-4">
                        <div class="flex items-center gap-x-7">
                            <input type="checkbox" class="size-5 cursor-pointer item-checkbox"
                                data-price="{{ $cart_product->product->price }}"
                                data-quantity="{{ $cart_product->quantity }}" data-id="{{$cart_product->product->id}}" />

                            <a href="{{url('/' . $cart_product->product->image)}}" target="_blank"
                                class="w-28 h-28 max-sm:w-24 max-sm:h-24 cursor-pointer shrink-0 bg-gray-100 p-2 rounded-md">
                                <img src='{{url('/' . $cart_product->product->image)}}'
                                    class="w-full h-full rounded-md object-cover" />
                            </a>
                        </div>

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
                    Subtotal Produk
                    <span id="subtotal" class="ml-auto font-bold">Rp.0</span>
                </li>


                <li class="flex flex-wrap gap-4 text-sm">
                    Pengiriman
                    <span class="ml-auto font-bold">Rp. {{ $shipping }}</span>
                </li>

                <hr class="border-gray-300" />

                <li class="flex flex-wrap gap-4 text-sm font-bold">
                    Total
                    <span id="total" class="ml-auto">Rp.20.000</span>
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
                <form action="{{route('order.checkout')}}" method="post">
                    @csrf
                    <input type="hidden" id="selected-items" name="selected-items" class="border border-black">
                    <button type="submit"
                        class="text-sm px-4 py-2.5 w-full font-semibold tracking-wide bg-gray-800 hover:bg-gray-900 text-white rounded-md">Checkout</button>
                </form>
                <button type="button"
                    class="text-sm px-4 py-2.5 w-full font-semibold tracking-wide bg-transparent text-gray-800 border border-gray-300 rounded-md">
                    <a href="{{ route('store.index') }}">Continue Shopping</a>
                </button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>

        const sub_total_element = document.getElementById("subtotal");
        const total_element = document.getElementById("total");

        function setSelectedItem() {
            let selected_items = []
            document.querySelectorAll('.item-checkbox:checked').forEach(checkbox => {
                selected_items.push({
                    product_id: parseInt(checkbox.dataset.id),
                    quantity: parseInt(checkbox.dataset.quantity)
                });
                document.getElementById('selected-items').value = JSON.stringify(selected_items);
            });
        }

        function calculateSubtotal() {
            let subtotal = 0;
            let total = 0;

            document.querySelectorAll('.item-checkbox:checked').forEach(checkbox => {
                const price = parseFloat(checkbox.dataset.price);
                const quantity = parseInt(checkbox.dataset.quantity);
                subtotal += price * quantity;
            });
            total += subtotal + 20000

            sub_total_element.innerHTML = `Rp.${subtotal}`;
            total_element.innerHTML = `Rp.${total}`;
        }

        document.querySelectorAll('.item-checkbox').forEach(checkbox => {
            checkbox.addEventListener('change', calculateSubtotal);
        });

        document.querySelectorAll('.item-checkbox').forEach(checkbox => {
            checkbox.addEventListener('change', setSelectedItem);
        });

        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.quantity-button').forEach(button => {
                button.addEventListener('click', function () {
                    const productId = this.dataset.productId;
                    const quantity = this.dataset.quantity;

                    fetch('{{ route('cart.update.quantity') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            product_id: productId,
                            quantity: quantity
                        })
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                document.querySelector('#total').innerText = data.total;
                            }
                        });
                });
            });
        });
    </script>
@endpush


@endsection