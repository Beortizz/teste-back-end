<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Services\ProductService;

class ProductsTable extends Component
{
    use WithPagination;

    public $searchTerm = '';
    protected $productService;

    public function mount(ProductService $productService) 
    {
        $this->productService = $productService;
    }

    public function updatingSearchTerm()
    {
        
        $this->resetPage(); 
    }

    public function getProductService()
    {
    
        return app(ProductService::class);
    }


    public function render()
    {

        $products = $this->getProductService()->search($this->searchTerm);
        
        return view('livewire.products-table', [
            'products' => $products,
        ]);
    }
}
