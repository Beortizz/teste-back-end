@php
    $imageUrl = Str::startsWith($product->image_url, 'https://fakestoreapi.com') 
                ? $product->image_url 
                : asset('storage/' . $product->image_url);
    
    $details = [
        'Price' => '$' . number_format($product->price, 2),
        'Category' => $product->category,
    ];
@endphp
<x-show 
    title="{{ $product->name }}" 
    imageUrl="{{ $imageUrl }}" 
    description="{{ $product->description }}" 
    :details="$details" 
    backUrl="{{ route('products.index') }}" 
/>
