<x-layout>
    <x-slot:heading>
        Cart Page
    </x-slot:heading>

    Cart Content
    @if(empty($cart))
        <p class="text-white">Cart is Empty</p>
    @else
        @foreach($cart as $id => $item)
            <div class="bg-gray-800 p-4 mb-4 rounded">
                <h2 class="text-white">{{$item['name']}}</h2>
                <p class="text-grey-400">${{$item['price']}}</p>

                <form method="POST" action="/cart/update/{{$id}}">
                    @csrf
                    <input type="number" name="quantity" value="{{$item['quantity']}}" class="w-20">
                    <button class="text-indigo-400">Update</button>
                </form>

                <form method="POST" action="/cart/remove/{{$id}}">
                    @csrf
                    <button class="text-red-400">Remove</button>
                </form>
            </div>
        @endforeach
        <form method="POST" action="/checkout" class="mt-6">
            @csrf

            <input name="customer_name" placeholder="Name" class="block mb-2 p-2">

    <input name="email" placeholder="Email" class="block mb-2 p-2">

    <input name="address" placeholder="Street Address" class="block mb-2 p-2">

    <input name="zip_code" placeholder="ZIP Code" class="block mb-2 p-2">

    <button class="bg-green-600 text-white px-4 py-2 rounded">
        Checkout
            </button>
        </form>
    @endif
    @php
        $total = collect($cart)->sum(function($item){
            return $item['price'] * $item['quantity'];
        });
    @endphp

    <div class="text-white mt-4">
        <strong>Total: ${{$total}}</strong>
    </div>
</x-layout>