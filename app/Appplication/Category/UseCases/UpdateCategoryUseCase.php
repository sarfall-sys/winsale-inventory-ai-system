<?php

namespace App\Appplication\Category\UseCases;

use App\Domain\Category\Repositories\CategoryRepositoryInterface;
use App\Domain\Category\Services\CategoryService;

class UpdateCategoryUseCase
{
    private $categoryRepository;

    private $categoryService;

    public function __construct(CategoryService $categoryService, CategoryRepositoryInterface $categoryRepositoryInterface)
    {
        $this->categoryRepository = $categoryRepositoryInterface;
        $this->categoryService = $categoryService;
    }

    public function handle(array $data)
    {
        $category = $this->categoryService->updateCategory($data);

        return $this->categoryRepository->update($category);
    }
}
