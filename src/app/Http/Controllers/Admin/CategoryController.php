<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\CreateCategoryRequest;
use App\Http\Requests\Admin\Category\UpdateCategoryRequest;
use App\Http\Resources\Admin\Category\CategoryResource;
use App\Http\Resources\PaginationResource;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function index(CategoryService $categoryService)
    {
        $propertyTypesPaginate = $categoryService->categoriesPaginate();

        return Inertia::render('Category/Categories', [
            'categories' => CategoryResource::collection($propertyTypesPaginate->items()),
            'pagination' => PaginationResource::make($propertyTypesPaginate),
        ]);
    }

    public function create()
    {
        $lastOrder = Category::query()->max('order');
        $lastOrder = ($lastOrder ?: 0) + 1;

        return Inertia::render('Category/CreateCategory', [
            'lastOrder' => $lastOrder,
        ]);
    }

    public function store(CreateCategoryRequest $request, CategoryService $categoryService)
    {
        $categoryService->create($request->validated());

        return Redirect::route('admin.categories.index');
    }

    public function edit(int $id)
    {
        $propertyType = Category::query()->findOrFail($id);

        return Inertia::render('Category/EditCategory', [
            'category' => $propertyType,
        ]);
    }

    public function update(UpdateCategoryRequest $request, int $id, CategoryService $categoryService)
    {
        $categoryService->update($id, $request->validated());

        return Redirect::route('admin.categories.index');
    }

    public function destroy(int $id, CategoryService $categoryService)
    {
        $categoryService->destroy($id);

        return Redirect::back();
    }
}
