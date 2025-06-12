@extends('layouts.app')
@section('title', 'Cart')
@section('content')

    @php
        $clothe = '';
        $total = $cart->sum(function ($item) {
            return $item->clothe->price * $item->quantity;
        });
    @endphp
    <div class="container mx-auto mt-10">
        <div class="sm:flex shadow-md my-10">
            <div class="  w-full  sm:w-3/4 bg-white px-10 py-10 relative">
                <div class="flex justify-between border-b pb-8">
                    <h1 class="font-semibold text-2xl">Shopping Cart</h1>
                    <h2 class="font-semibold text-2xl">{{ $cart->count() }}Item{{ $cart->count() > 1 ? 's' : '' }}</h2>
                </div>
                @if (!$cart->isEmpty())
                    @foreach ($cart as $clothes_cart)
                        <div class="md:flex items-strech py-8 md:py-10 lg:py-8 border-t border-gray-50">
                            <div class="md:w-4/12 2xl:w-1/4 w-full">
                                <img src="{{ asset('/uploads/products/' . $clothes_cart->clothe->photo) }}"
                                    alt="Black Leather Purse" class="h-full object-center object-cover md:block hidden" />
                                <img src="{{ asset('/uploads/products/' . $clothes_cart->clothe->photo) }}"
                                    alt="Black Leather Purse" class="md:hidden w-full h-full object-center object-cover" />
                            </div>
                            <div class="md:pl-3 md:w-8/12 2xl:w-3/4 flex flex-col justify-center">
                                <p class="text-xs leading-3 text-gray-800 md:pt-0 pt-4">
                                    {{ $clothes_cart->clothe->brand->name }}</p>
                                <div class="flex items-center justify-between w-full">
                                    <p class="text-base font-black leading-none text-gray-800">
                                        {{ $clothes_cart->clothe->name }}</p>
                                    <form action="/clothe/checkout" method="post">
                                        @csrf
                                        <select onchange="updateQuantity({{ $clothes_cart->id }}, this.value)"
                                            aria-label="Select quantity" class="quantity" name="quantity"
                                            class="py-2 px-1 border border-gray-200 mr-6 focus:outline-none">
                                            @for ($i = 1; $i <= $clothes_cart->clothe->quantity_in_stock; $i++)
                                                <option {{ $i == $clothes_cart->quantity ? 'selected' : '' }}
                                                    value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                </div>
                                <p class="text-xs leading-3 text-gray-600 pt-2">Height: 10 inches</p>
                                <p class="text-xs leading-3 text-gray-600 py-4">Color: {{ $clothes_cart->clothe->color }}
                                </p>
                                <p class="w-96 text-xs leading-3 text-gray-600">Detail:
                                    {{ $clothes_cart->clothe->description }}</p>
                                <div class="flex items-center justify-between pt-5">
                                    <div class="flex itemms-center">
                                        <p class="text-xs leading-3 underline text-gray-800 cursor-pointer">Add to favorites
                                        </p>
                                        <a href="/clothe/remove_cart/{{ $clothes_cart->id }}">
                                            <p class="text-xs leading-3 underline text-red-500 pl-5 cursor-pointer">Remove
                                            </p>
                                        </a>
                                    </div>
                                    <p class="text-base font-black leading-none text-gray-800">
                                        ${{ $clothes_cart->clothe->price }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="h-[400px] flex items-center justify-center">
                        <span>No item</span>
                    </div>
                @endif
                <a href="/" class="flex absolute bottom-8 font-semibold text-indigo-600 text-sm mt-10">
                    <svg class="fill-current mr-2 text-indigo-600 w-4" viewBox="0 0 448 512">
                        <path
                            d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z" />
                    </svg>
                    Continue Shopping
                </a>
            </div>
            <div id="summary" class=" w-full   sm:w-1/4   md:w-1/2     px-8 py-10">
                <h1 class="font-semibold text-2xl border-b pb-8">Order Summary</h1>
                <div class="flex justify-between mt-10 mb-5">
                    <span class="font-semibold text-sm uppercase">Item{{ $cart->count() > 1 ? 's' : '' }}
                        {{ $cart->count() }}</span>
                    <input type="hidden" name="total_price" id="total_price">
                    <span class="font-semibold text-sm" id="total">${{ $total }}</span>
                </div>
                <div>
                    <label class="font-medium inline-block mb-3 text-sm uppercase">
                        Shipping
                    </label>
                    <select class="block p-2 text-gray-600 w-full text-sm">
                        <option>Standard shipping - $10.00</option>
                    </select>
                </div>
                <div class="py-10">
                    <label for="promo" class="font-semibold inline-block mb-3 text-sm uppercase">
                        Promo Code
                    </label>
                    <input type="text" id="promo" placeholder="Enter your code" class="p-2 text-sm w-full" />
                </div>
                <button class="bg-red-500 hover:bg-red-600 px-5 py-2 text-sm text-white uppercase">
                    Apply
                </button>
                <div class="border-t mt-8">
                    <div class="flex font-semibold justify-between py-6 text-sm uppercase">
                        <span>Total cost</span>
                        <span>${{ $total + 10 }}</span>
                    </div>
                    <button
                        class="bg-indigo-500 font-semibold hover:bg-indigo-600 py-3 text-sm text-white uppercase w-full {{ $cart->isEmpty() ? 'disable' : '' }}">
                        Checkout
                    </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function updateQuantity(itemId, newQuantity) {
            fetch(`/cart/update-quantity/${itemId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({
                        quantity: newQuantity
                    }),
                })
                .then(res => res.json())
                .then(data => console.log('Quantity updated', data))
                .catch(err => console.error(err));
        }
        @if (!empty($clothes_cart))
            let quantity = document.querySelectorAll('.quantity');
            quantity.forEach(q => {
                q.addEventListener('change', function(e) {
                    document.getElementById('total').innerHTML = '$' + this.value *
                        {{ $clothes_cart->clothe->price }};
                    document.getElementById('total_price').value = this.value *
                        {{ $clothes_cart->clothe->price }};
                });
            });
        @endif
    </script>
@endsection
