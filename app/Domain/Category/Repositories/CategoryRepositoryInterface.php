<?php

namespace App\Domain\Category\Repositories;

use App\Domain\Category\Entities\Category;

interface CategoryRepositoryInterface
{
    public function create(Category $category);
    public function update(Category $category);
    public function delete($id);
    public function findById($id);
    public function findAll();
}
