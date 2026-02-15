<?php

namespace App\Infrastructure\Http\Controllers;

use App\Appplication\Category\UseCases\CreateCategoryUseCase;
use App\Appplication\Category\UseCases\GetCategoryUseCase;
use App\Appplication\Category\UseCases\ListCategoryUseCase;
use App\Appplication\Category\UseCases\UpdateCategoryUseCase;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Domain\Category\Entities\Category;
use App\Appplication\Category\DTOs\CreateCategoryDTO;

class CategoryController extends Controller
{
    private $getCategoryByIdUseCase;

    private $getAllCategoriesUseCase;

    private $createCategoryUseCase;

    private $updateCategoryUseCase;

    private $deleteCategoryUseCase;

    public function __construct(CreateCategoryUseCase $createCategoryUseCase, UpdateCategoryUseCase $updateCategoryUseCase, GetCategoryUseCase $getCategoryByIdUseCase, GetCategoryUseCase $getAllCategoriesUseCase, ListCategoryUseCase $listCategoryUseCase)
    {
        $this->createCategoryUseCase = $createCategoryUseCase;
        $this->updateCategoryUseCase = $updateCategoryUseCase;
        $this->getCategoryByIdUseCase = $getCategoryByIdUseCase;
        $this->getAllCategoriesUseCase = $getAllCategoriesUseCase;
        $this->getAllCategoriesUseCase = $listCategoryUseCase;
    }

    public function index() {
        $categories = $this->getAllCategoriesUseCase->handle();

        return response()->json($categories);
    }


    public function store(StoreCategoryRequest $request)
    {
        $dto = new CreateCategoryDTO(
            name: $request->name,
            description: $request->description
        );


        $created = $this->createCategoryUseCase->handle($dto);

        return response()->json($created);
    }


}
