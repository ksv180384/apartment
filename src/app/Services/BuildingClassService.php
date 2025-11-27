<?php

namespace App\Services;

use App\Models\BuildingClass;
use Illuminate\Database\Eloquent\Collection;

class BuildingClassService
{
    public function buildingClasses(): Collection
    {
        $buildingClasses = BuildingClass::query()
            ->orderBy('name')
            ->get();

        return $buildingClasses;
    }

    public function buildingClassesList(): Collection
    {
        $buildingClasses = BuildingClass::query()
            ->orderBy('name')
            ->get(['id', 'name', 'slug']);

        return $buildingClasses;
    }

    public function create(array $buildingClassData): BuildingClass
    {
        $buildingClass = BuildingClass::query()->create($buildingClassData);

        return $buildingClass;
    }

    public function update(int $id, array $buildingClassData): BuildingClass
    {
        $buildingClass = BuildingClass::query()->findOrFail($id);

        $buildingClass->update($buildingClassData);

        return $buildingClass;
    }

    public function destroy(int $id): void
    {
        $buildingClass = BuildingClass::query()->findOrFail($id);

        $buildingClass->delete();
    }
}
