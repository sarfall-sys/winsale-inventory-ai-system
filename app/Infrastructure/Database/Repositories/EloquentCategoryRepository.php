<?php

namespace App\Infrastructure\Database\Repositories;

use App\Domain\Category\Entities\Category;
use App\Domain\Category\Repositories\CategoryRepositoryInterface;
use App\Infrastructure\Database\Eloquent\Models\Category as EloquentCategory;

class EloquentCategoryRepository implements CategoryRepositoryInterface
{
    // Implement repository methods for managing contacts using Eloquent ORM
    public function create(Category $category): Category
    {
        $model = EloquentCategory::create([
            'name' => $category->name,
            'description' => $category->description,
        ]);

        return new Category(
            name: $model->name,
            description: $model->description,
        );

    }

    public function update(Category $category): Category
    {

        $model = EloquentCategory::find($category->id);
        if ($model) {
            $model->name = $category->name;
            $model->description = $category->description;
            $model->save();

            return new Category(
                name: $model->name,
                description: $model->description,
            );
        }

        return new Category(
            name: $category->name,
            description: $category->description,
        );
    }

    public function delete($id)
    {
        $eloquentCategory = EloquentCategory::find($id);
        if ($eloquentCategory) {
            $eloquentCategory->delete();

            return true;
        }

        return false;
    }

    public function findById($id)
    {
        return EloquentCategory::find($id);
    }

    public function findAll(): array
    {
        $categories = EloquentCategory::all();

        //Maping
        return $categories->map(function ($model) {
            return new Category(
                id: $model->id,
                name: $model->name,
                description: $model->description,
            );
        })->toArray();


    }
}
