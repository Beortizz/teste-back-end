<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Product;
use App\Models\Category;    

class ImportProductsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $products;
    /**
     * Create a new job instance.
     */
    public function __construct(array|object $products)
    {
        $this->products = $products;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Import products
        foreach ($this->products as $productData) {
            Product::updateOrCreate(
                ['id' => $productData['id']],
                [
                    'name' => $productData['title'],
                    'price' => $productData['price'],
                    'category' => $productData['category'],
                    'description' => $productData['description'],
                    'image_url' => $productData['image'],
                ]
            );
            Category::updateOrCreate(
                ['name' => $productData['category']],
                ['name' => $productData['category']]
            );
        }
    }
}
