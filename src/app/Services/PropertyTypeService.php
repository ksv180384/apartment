<?php

namespace App\Services;

use App\Models\PropertyType;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class PropertyTypeService
{

    public function PropertyTypesPaginate(): LengthAwarePaginator
    {
        $categories = PropertyType::query()
            ->orderBy('order')
            ->orderBy('name')
            ->paginate(15);

        return $categories;
    }

    public function PropertyTypesList(): Collection
    {
        $categories = PropertyType::query()
            ->orderBy('order')
            ->orderBy('name')
            ->get(['id', 'name', 'slug']);

        return $categories;
    }

    public function create(array $categoryData): PropertyType
    {
        $category = PropertyType::query()->create($categoryData);

        return $category;
    }

    public function update(int $id, array $categoryData): PropertyType
    {
        $category = PropertyType::query()->findOrFail($id);

        $category->update($categoryData);

        return $category;
    }

    public function destroy(int $id): void
    {
        $category = PropertyType::query()->findOrFail($id);

        $category->delete();
    }
}
