<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'category',
        'image_url',
    ];

    public function scopeSearch($query, $searchTerm)
    {
        if ($searchTerm) {
            $query->where('name', 'like', '%' . $searchTerm . '%')
                ->orWhere('description', 'like', '%' . $searchTerm . '%');
        }
        return $query;
    }

    public function scopeFilter($query, $filter)
    {
        if ($filter) {
            if(isset($filter['category'])) {
                $query->where('category', $filter['category']);
            }
            if(isset($filter['id'])) {
                $query->where('id', $filter['id']);
            }
            
            if(isset($filter['product_with_image']) && $filter['product_with_image'] == 'yes') {
                $query->whereNotNull('image_url');
            }
            if(isset($filter['product_with_image']) && $filter['product_with_image'] == 'no') {
                $query->whereNull('image_url');
            }
        }
        return $query;
    }
}
