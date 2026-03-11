<?php

namespace App\Infrastructure\Http\Controllers;

use App\Appplication\Category\UseCases\CreateCategoryUseCase;
use App\Appplication\Category\UseCases\GetCategoryUseCase;
use App\Appplication\Category\UseCases\ListCategoryUseCase;
use App\Appplication\Category\UseCases\UpdateCategoryUseCase;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Appplication\Category\DTOs\CreateCategoryDTO;
use App\Appplication\Category\UseCases\DeleteCategoryUseCase;
use App\Infrastructure\Http\Requests\StoreCategoryRequest as RequestsStoreCategoryRequest;

class CategoryController extends Controller
{
    private $getCategoryByIdUseCase;

    private $getAllCategoriesUseCase;

    private $createCategoryUseCase;

    private $updateCategoryUseCase;

    private $deleteCategoryUseCase;

    public function __construct(CreateCategoryUseCase $createCategoryUseCase, UpdateCategoryUseCase $updateCategoryUseCase, GetCategoryUseCase $getCategoryByIdUseCase, ListCategoryUseCase $listCategoryUseCase, DeleteCategoryUseCase $deleteCategoryUseCase)
    {
        $this->createCategoryUseCase = $createCategoryUseCase;
        $this->updateCategoryUseCase = $updateCategoryUseCase;
        $this->getCategoryByIdUseCase = $getCategoryByIdUseCase;
        $this->getAllCategoriesUseCase = $listCategoryUseCase;
        $this->deleteCategoryUseCase = $deleteCategoryUseCase;
    }

    public function index() {
        $categories = $this->getAllCategoriesUseCase->handle();

        return response()->json($categories);
    }


    public function store(RequestsStoreCategoryRequest $request)
    {
        $dto = new CreateCategoryDTO(
            name: $request->name,
            description: $request->description
        );


        $created = $this->createCategoryUseCase->handle($dto);

        return response()->json($created);
    }

    public function show($id)
    {
        $category = $this->getCategoryByIdUseCase->handle($id);

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        return response()->json($category);
    }

    public function update(UpdateCategoryRequest $request, $id)
    {
        $dto = new CreateCategoryDTO(
            name: $request->name,
            description: $request->description
        );

        $updated = $this->updateCategoryUseCase->handle($dto);

        if (!$updated) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        return response()->json($updated);
    }

    public function destroy($id)
    {
        $deleted = $this->deleteCategoryUseCase->handle($id);

        if (!$deleted) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        return response()->json(['message' => 'Category deleted successfully']);
    }

}
