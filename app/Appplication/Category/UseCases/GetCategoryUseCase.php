<?php
namespace App\Appplication\Category\UseCases;

use App\Domain\Category\Repositories\CategoryRepositoryInterface;

class GetCategoryUseCase {

    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepositoryInterface)
    {
        $this->categoryRepository = $categoryRepositoryInterface;
    }

    public function handle($id)
    {
        return $this->categoryRepository->findById($id);
    }

}
