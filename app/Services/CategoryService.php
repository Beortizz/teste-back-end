<?php 

namespace App\Services;

use App\Models\Category;
use App\Repositories\Interfaces\CategoryInterface;

class CategoryService
{
    protected $categoryRepository;

    public function __construct(CategoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    
    public function getAll()
    {
        return $this->categoryRepository->getAll();
    }

    public function getById($id)
    {
        return $this->categoryRepository->getById($id);
    }

    public function create(array $data)
    {
        return $this->categoryRepository->create($data);
    }

    public function update($id, array $data)
    {
        return $this->categoryRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->categoryRepository->delete($id);
    }


}