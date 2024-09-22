<?php 

namespace App\Services;
use App\Repositories\Interfaces\ProductInterface;
use Illuminate\Support\Facades\Storage;

class ProductService 
{
    protected $productRepository;

    public function __construct(ProductInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getAll()
    {
        return $this->productRepository->getAll();
    }

    public function getPaginatedProducts(int $perPage = 10)
    {
        return $this->productRepository->paginate($perPage);
    }

    public function getById($id)
    {
        return $this->productRepository->getById($id);
    }

    public function create(array $data)
    {
        if (isset($data['image']))  {
            $image = $data['image'];    
            $path = $image->storePubliclyAs('/products', $image->getClientOriginalName(), 'public');
            $data['image_url'] = $path; 
        }
        return $this->productRepository->create($data);
    }

    public function update($id, array $data)
    {
        if (isset($data['image'])) {
            $product = $this->productRepository->getById($id);
            $product = $this->updateImage($product, $data['image']);
            $data['image_url'] = $product->image_url;
        }
        return $this->productRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->productRepository->delete($id);
    }

    private function deleteImage($product)
    {
        $path = "public/". $product->image_url;
        if(Storage::exists($path)) {
            Storage::delete($path);
        }
    }

    public function updateImage($product, $image): mixed
    {
        $this->deleteImage($product);
        $path = $image->storePubliclyAs('/products', $image->getClientOriginalName(), 'public');
        $product->image_url = $path;
        return $product;
    }

    public function search(string $searchTerm = null, int $perPage = 10)
    {
        return $this->productRepository->search($searchTerm, $perPage);
    }
}