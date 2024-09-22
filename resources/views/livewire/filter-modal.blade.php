<x-modal-component id="productModal" title="Filter Products">
    <!-- Form inputs go here -->
    <form>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Product ID</label>
            <input type="number" class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-500" placeholder="Enter product ID">
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Product with image</label>
            <select class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-500">
                <option selected hidden>Select Product with image</option>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Category</label>
            <select class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-500">
                <option>Select Category</option>
                <option>Electronics</option>
                <option>Clothing</option>
                <option>Home</option>
            </select>
        </div>
    </form>

    <x-slot name="footer">
        <button @click="showModal = false" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
            Cancel
        </button>
        <button class="bg-blue-500 text-white px-4 py-2 ml-2 rounded hover:bg-blue-600">
            Filter
        </button>
    </x-slot>
</x-modal-component>
