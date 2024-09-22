<x-app-layout>
    <x-table url="{{ route('categories.create') }}" title="categories">
        <x-slot name="header">
            <th scope="col" class="px-4 py-2 text-left">name</th>
        </x-slot>

        @forelse ($categories as $category)
            <tr class="hover:bg-gray-100">
                <td class="px-4 py-2">{{ $category->name }}</td>
                <td class="px-4 py-2">
                    <div class="flex space-x-2 justify-end">
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm bg-gray-300 text-gray-700 rounded px-2 py-1">Edit</a>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm bg-red-500 text-white rounded px-2 py-1" onclick="return confirm('Are you sure you want to delete this category?')">
                                Delete
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="text-center py-4">No categories found.</td>
            </tr>
        @endforelse
    </x-table>
</x-app-layout>
