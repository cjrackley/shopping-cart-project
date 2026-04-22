<x-layout>
        <x-slot:heading>
        Orders Page
    </x-slot:heading>
    @if($orders->isEmpty())
        <p class="text-white">No orders yet.</p>
    @else
        @foreach($orders as $order)
            <div class="bg-gray-800 p-4 mb-4 rounded">

                <p class="text-white">
                    Order #{{ $order->id }}
                </p>

                <p class="text-gray-400">
                    Date: {{ $order->date }}
                </p>

                <p class="text-gray-400">
                    Status: {{ $order->status }}
                </p>

                <p class="text-white">
                    Total: ${{ $order->total_amount }}
                </p>

            </div>
        @endforeach
    @endif
</x-layout>