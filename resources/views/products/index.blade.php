<x-app-layout>
    <x-table url="{{ route('products.create') }}" title="Products">
        <x-slot name="header">
            <th scope="col" class="px-4 py-2 text-left">Product</th>
            <th scope="col" class="px-4 py-2 text-left">Category</th>
            <th scope="col" class="px-4 py-2 text-left">Price</th>
            <th scope="col" class="px-4 py-2 text-left">Actions</th>
        </x-slot>

        @forelse ($products as $product)
            <tr class="hover:bg-gray-100">
                <td class="px-4 py-2">
                    <div class="flex items-center">
                        <img src="{{ Str::startsWith($product->image_url, 'https://fakestoreapi.com') ? $product->image_url : asset('storage/' . $product->image_url) }}" alt="{{ $product->name }}" class="rounded-full mr-2" width="32" height="32">
                        <span>{{ $product->name }}</span>
                    </div>
                </td>
                <td class="px-4 py-2">{{ $product->category }}</td>
                <td class="px-4 py-2">${{ number_format($product->price, 2) }}</td>
                <td class="px-4 py-2">
                    <div class="flex space-x-2">
                        <a href="{{ route('products.show', $product) }}" class="btn btn-sm bg-blue-500 text-white rounded px-2 py-1">View</a>
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-sm bg-gray-300 text-gray-700 rounded px-2 py-1">Edit</a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm bg-red-500 text-white rounded px-2 py-1" onclick="return confirm('Are you sure you want to delete this product?')">
                                Delete
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="text-center py-4">No products found.</td>
            </tr>
        @endforelse
    </x-table>
</x-app-layout>
