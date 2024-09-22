<?php


namespace App\Repositories\Eloquent;

use App\Models\Product;
use App\Repositories\Interfaces\ProductInterface;

class ProductRepository implements ProductInterface
{
    protected $model;

    public function __construct(Product $product)
    {
        $this->model = $product;
    }


    public function getAll()
    {
        return $this->model->all();
    }

    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $product = $this->model->findOrFail($id);
        $product->update($data);
        return $product;
    }

    public function delete($id)
    {
        $product = $this->model->findOrFail($id);
        $product->delete();
        return $product;
    }

    public function paginate($perPage = 10)
    {
        return $this->model->paginate($perPage);
    }

    public function search(string $searchTerm = null, int $perPage = 15)
    {
        $query = $this->model->query();

        if ($searchTerm) {
            $query->where('name', 'like', '%' . $searchTerm . '%')
                  ->orWhere('category', 'like', '%' . $searchTerm . '%');
        }

        return $query->paginate($perPage);
    }
}
