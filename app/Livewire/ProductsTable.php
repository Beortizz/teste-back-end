<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Services\ProductService;
use App\Services\CategoryService;

class ProductsTable extends Component
{
    use WithPagination;

    public $searchTerm = '';

    public $filter = [
        'id' => null,
        'product_with_image' => null,
        'category' => null,

    ];
    protected $productService;


    public function mount(ProductService $productService, CategoryService $categoryService) 
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }

    public function applyFilters()
    {
        $this->searchTerm = '';
        $this->dispatch('filtersApplied', $this->filter);
        $this->resetPage();
    }

    public function resetFilters()
    {
        $this->filter = [
            'id' => null,
            'product_with_image' => null,
            'category' => null,
        ];
        $this->reset();
        $this->resetPage();
    }

    public function getCategories()
    {
        return $this->getCategoryService()->getAll();
    }


    public function updatingSearchTerm()
    {
        $this->resetFilters();
        $this->resetPage(); 
    }

    public function getProductService()
    {
    
        return app(ProductService::class);
    }

    public function getCategoryService()
    {
        return app(CategoryService::class);
    }



    public function render()
    {

        $products = $this->getProductService()->getPaginatedProducts(10, $this->filter, $this->searchTerm);
        $categories = $this->getCategories();
        return view('livewire.products-table', [
            'products' => $products,
            'categories' => $categories
        ]);
    }
}
