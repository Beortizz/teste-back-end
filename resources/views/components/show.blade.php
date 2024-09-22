@props(['title', 'imageUrl', 'description', 'details', 'backUrl'])

<x-app-layout>
    <div class="container mx-auto mt-5">
        <div class="bg-white shadow rounded-lg overflow-hidden">
            <div class="bg-gray-200 p-4">
                <h3 class="text-lg font-semibold">{{ $title }}</h3>
            </div>
            <div class="p-4">
                <div class="flex flex-col md:flex-row">
                    <div class="md:w-1/2 flex justify-center py-4">
                        <img src="{{ $imageUrl }}" alt="{{ $title }}" class="w-60 h-auto rounded">
                    </div>
                    <div class="md:w-1/2">
                        <h4 class="font-semibold">Description</h4>
                        <p>{{ $description }}</p>
                        @if($details)
                            <h4 class="font-semibold mt-4">Additional Details</h4>
                            <ul class="list-disc pl-5">
                                @foreach($details as $label => $value)
                                    <li><strong>{{ $label }}:</strong> {{ $value }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
            <div class="bg-gray-200 p-4">
                <a href="{{ $backUrl }}" class="bg-gray-600 text-white px-4 py-2 rounded">Back</a>
            </div>
        </div>
    </div>
</x-app-layout>
