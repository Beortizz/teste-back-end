<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Jobs\ImportProductsJob;
use App\Jobs\ImportSingleProductJob;

class ImportProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:import {--id=}';

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
        $id = $this->option('id');

        if ($id) {
            $response = Http::get("{$fakeStoreUrl}/products/{$id}");

            if (!empty($response->json()) && $response->successful()) {
                $product = $response->json();
                ImportSingleProductJob::dispatch($product);
                $this->info('Product imported successfully');
            } else {
                $this->error('Failed to import product');
            }

        } else {

            $response = Http::get("{$fakeStoreUrl}/products");
            
            if ($response->successful()) {
                $products = $response->json();
                ImportProductsJob::dispatch($products);
                $this->info('Products imported successfully');
            } else {
                $this->error('Failed to import products');
            }
        }

    }
}
