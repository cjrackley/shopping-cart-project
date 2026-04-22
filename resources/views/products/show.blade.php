<x-layout>
    <x-slot:heading>
        {{ $product->name }}
    </x-slot:heading>

    <div class="bg-gray-800 p-6 rounded">
        
        @if($product->image)
            <img src="{{ $product->img_url }}" class="mb-4 w-64">
        @endif

        <h2 class="text-white text-2xl mb-2">
            {{ $product->name }}
        </h2>

        <p class="text-gray-400 mb-4">
            {{ $product->description }}
        </p>

        <p class="text-white text-xl mb-4">
            ${{ $product->price }}
        </p>

        <!-- Add to Cart -->
        <form method="POST" action="/cart/add/{{ $product->p_id }}">
            @csrf
            <button class="bg-indigo-600 px-4 py-2 text-white rounded">
                Add to Cart
            </button>
        </form>

    </div>
</x-layout>