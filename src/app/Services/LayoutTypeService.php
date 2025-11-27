<?php

namespace App\Services;

use App\Models\Condition;
use App\Models\LayoutType;
use App\Models\Purpose;
use App\Models\RepairType;
use Illuminate\Database\Eloquent\Collection;

class LayoutTypeService
{
    public function layoutTypes(): Collection
    {
        $purpose = LayoutType::query()
            ->orderBy('name')
            ->get();

        return $purpose;
    }

    public function layoutTypesList(): Collection
    {
        $purpose = LayoutType::query()
            ->orderBy('name')
            ->get(['id', 'name', 'slug']);

        return $purpose;
    }

    public function create(array $purposeData): LayoutType
    {
        $layoutType = LayoutType::query()->create($purposeData);

        return $layoutType;
    }

    public function update(int $id, array $layoutTypeData): LayoutType
    {
        $layoutType = LayoutType::query()->findOrFail($id);

        $layoutType->update($layoutTypeData);

        return $layoutType;
    }

    public function destroy(int $id): void
    {
        $layoutType = LayoutType::query()->findOrFail($id);

        $layoutType->delete();
    }
}
