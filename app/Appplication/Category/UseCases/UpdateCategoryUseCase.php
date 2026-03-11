<?php

namespace App\Appplication\Category\UseCases;

use App\Appplication\Category\DTOs\CreateCategoryDTO;
use App\Domain\Category\Entities\Category;
use App\Domain\Category\Repositories\CategoryRepositoryInterface;

class UpdateCategoryUseCase
{
    private $categoryRepository;

    public function __construct( CategoryRepositoryInterface $categoryRepositoryInterface)
    {
        $this->categoryRepository = $categoryRepositoryInterface;
    }

    public function handle(CreateCategoryDTO $data)
    {
        $category = new Category(
            id: null,
            name: $data->name,
            description: $data->description,

        );


        return $this->categoryRepository->update($category);
    }
}
