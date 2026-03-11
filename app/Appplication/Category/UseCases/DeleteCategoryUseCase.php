<?php
namespace App\Appplication\Category\UseCases;

use App\Domain\Category\Repositories\CategoryRepositoryInterface;
class DeleteCategoryUseCase
{
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function handle($id)
    {
        return $this->categoryRepository->delete($id);
    }

}
