@props(['action', 'method', 'title', 'hasFiles' => false])

<div class="bg-white shadow-md rounded-lg p-6">
    <div class="mb-4">
        <h3 class="text-lg font-semibold">{{ $title }}</h3>
    </div>
    <div>
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 p-4 mb-4 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ $action }}" method="POST" {!! $hasFiles ? 'enctype="multipart/form-data"' : '' !!}>
            @csrf
            @method($method)
            {{ $fields ?? null }}

            <div class="mt-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">Submit</button>
            </div>
        </form>
    </div>
</div>
