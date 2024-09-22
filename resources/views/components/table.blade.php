@props(['header', 'url', 'title'])

<div class="overflow-x-auto">
    <div class="flex justify-between items-center mb-2">
        <h5 class="mb-0 text-lg font-semibold">{{ $title }}</h5>
        <a href="{{ $url }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">Add New</a>
    </div>
    <table class="min-w-full border-collapse border border-gray-200">
        <thead class="bg-gray-100">
            <tr>
                {{ $header }}
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            {{ $slot }}
        </tbody>
    </table>
</div>
