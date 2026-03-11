<?php

namespace   App\Appplication\Category\UseCases;
use App\Domain\Category\Repositories\CategoryRepositoryInterface;

class ListCategoryUseCase{

    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepositoryInterface)
    {
        $this->categoryRepository = $categoryRepositoryInterface;
    }

    public function handle(): array
    {
        $category = $this->categoryRepository->findAll();
        return $category;
    }

}
