<x-app-layout>
    <x-form action="{{ route('categories.update', $category) }}" method="PUT" title="Edit Category" hasFiles="false">
        <x-slot name="fields">
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Category Name</label>
                <input type="text" name="name" id="name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500" value="{{ old('name', $category->name) }}" required>
            </div>
        </x-slot>
    </x-form>
</x-app-layout>
