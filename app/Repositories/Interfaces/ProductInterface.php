<?php
namespace App\Repositories\Interfaces;

interface ProductInterface
{
    public function getAll();
    public function getById($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
    public function paginate(int $perPage = 10);
    public function search(string $searchTerm = null, int $perPage = 15);



}