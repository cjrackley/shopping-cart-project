<x-layout>
        <x-slot:heading>
        Orders Page
    </x-slot:heading>
    @foreach($orders as $order)
        <div class="bg-gray-800 p-4 mb-4 rounded">
            <p class="text-white">Name: {{$order->name}}</p>
            <p class="text-gray-400">Total: ${{$order->total}}</p>
        </div>
    @endforeach
</x-layout>