<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryService
{

    public function categoriesPaginate(): LengthAwarePaginator
    {
        $categories = Category::query()
            ->orderBy('order')
            ->orderBy('name')
            ->paginate(15);

        return $categories;
    }

    public function categoriesList(): Collection
    {
        $categories = Category::query()
            ->orderBy('order')
            ->orderBy('name')
            ->get(['id', 'name', 'slug']);

        return $categories;
    }

    public function create(array $categoryData): Category
    {
        $category = Category::query()->create($categoryData);

        return $category;
    }

    public function update(int $id, array $categoryData): Category
    {
        $category = Category::query()->findOrFail($id);

        $category->update($categoryData);

        return $category;
    }

    public function destroy(int $id): void
    {
        $category = Category::query()->findOrFail($id);

        $category->delete();
    }
}
