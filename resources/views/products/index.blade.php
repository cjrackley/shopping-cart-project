<x-layout>
        <x-slot:heading>
        Product Page
    </x-slot:heading>
@foreach ($products as $product)
    <div class="bg-gray-800 p-4 rounded mb-4">
        <h2 class="text-white text-xl">{{$product->name}}</h2>
        <p class="text-grey-400">${{$product->price}}</p>

        <a href="/products/{{$product->id}}" class="text-indigo-400">
            View
        </a>
    </div>

@endforeach
</x-layout>

