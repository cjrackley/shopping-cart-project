<x-layout>
    <x-slot:heading>
        Order #{{ $order->id }}
    </x-slot:heading>

    <p class="text-gray-400">Status: {{ $order->status }}</p>
    <p class="text-white">Total: ${{ $order->total_amount }}</p>

    <h3 class="text-white mt-4">Items:</h3>

    @foreach($order->items as $item)
        <div class="text-gray-300 ml-4">
            {{ $item->product->name }} -
            Qty: {{ $item->quantity }} -
            ${{ $item->unit_price }}
        </div>
    @endforeach

    <h3 class="text-white mt-6">Shipping:</h3>

    @if($order->shipping)
        <div class="text-gray-400">
            {{ $order->shipping->customer_name }} <br>
            {{ $order->shipping->address }} <br>
            {{ $order->shipping->zip_code }}
        </div>
    @endif
</x-layout>