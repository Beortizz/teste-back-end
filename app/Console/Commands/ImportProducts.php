<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Product;

class ImportProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import producsts from the fake store API';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Importing products...');
        $fakeStoreUrl = env('FAKE_STORE_URL');
        $response = Http::get("{$fakeStoreUrl}/products");


        if ($response->successful()) {

            $products = $response->json();


            foreach ($products as $productData) {
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
            }
            $this->info('Products imported successfully');
        } else {
            $this->error('Failed to import products');
        }

    }
}
