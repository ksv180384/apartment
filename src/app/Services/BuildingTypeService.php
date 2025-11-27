<?php

namespace App\Services;

use App\Models\BuildingClass;
use App\Models\BuildingType;
use Illuminate\Database\Eloquent\Collection;

class BuildingTypeService
{
    public function buildingTypes(): Collection
    {
        $buildingTypes = BuildingType::query()
            ->orderBy('name')
            ->get();

        return $buildingTypes;
    }

    public function buildingTypesList(): Collection
    {
        $buildingTypes = BuildingType::query()
            ->orderBy('name')
            ->get(['id', 'name', 'slug']);

        return $buildingTypes;
    }

    public function create(array $buildingTypeData): BuildingType
    {
        $buildingType = BuildingType::query()->create($buildingTypeData);

        return $buildingType;
    }

    public function update(int $id, array $buildingTypeData): BuildingType
    {
        $buildingType = BuildingType::query()->findOrFail($id);

        $buildingType->update($buildingTypeData);

        return $buildingType;
    }

    public function destroy(int $id): void
    {
        $buildingType = BuildingType::query()->findOrFail($id);

        $buildingType->delete();
    }
}
