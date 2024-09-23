<x-modal-component id="productModal" title="Filter Products">
    <form wire:submit.prevent="applyFilters" id="form-filter">
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Product ID</label>
            <input type="number" wire:model="filter.id"
                class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-500"
                placeholder="Enter product ID">
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Product with image</label>
            <select wire:model="filter.product_with_image"
                class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-500">
                <option selected hidden>Select Product with image</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Category</label>
            <select wire:model="filter.category"
                class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-500">
                <option selected hidden>Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <x-slot name="footer">
            <button wire:click="resetFilters" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">
                Clear Filters
            </button>
            <button type="button" @click="showModal = false"
                class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                Cancel
            </button>
            <button class="bg-blue-500 text-white px-4 py-2 ml-2 rounded hover:bg-blue-600" type="submit"
                form="form-filter" @click="showModal = false">
                Filter
            </button>
        </x-slot>
    </form>
</x-modal-component>
