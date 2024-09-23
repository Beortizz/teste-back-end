<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Product;

class ImportSingleProductJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $product;
    /**
     * Create a new job instance.
     */
    public function __construct(array|object $product)
    {
        $this->product = $product;
    }
   

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Product::updateOrCreate(
            ['id' => $this->product['id']],
            [
                'name' => $this->product['title'],
                'price' => $this->product['price'],
                'category' => $this->product['category'],
                'description' => $this->product['description'],
                'image_url' => $this->product['image'],
            ]
        );
    }
}
