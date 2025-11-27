<?php

namespace App\Services;

use App\Models\Condition;
use App\Models\GarageType;
use App\Models\Purpose;
use App\Models\RepairType;
use Illuminate\Database\Eloquent\Collection;

class GarageTypeService
{
    public function garageTypes(): Collection
    {
        $garageTypes = GarageType::query()
            ->orderBy('name')
            ->get();

        return $garageTypes;
    }

    public function garageTypesList(): Collection
    {
        $garageTypes = GarageType::query()
            ->orderBy('name')
            ->get(['id', 'name', 'slug']);

        return $garageTypes;
    }

    public function create(array $garageTypeData): GarageType
    {
        $garageType = GarageType::query()->create($garageTypeData);

        return $garageType;
    }

    public function update(int $id, array $garageTypeData): GarageType
    {
        $garageType = GarageType::query()->findOrFail($id);

        $garageType->update($garageTypeData);

        return $garageType;
    }

    public function destroy(int $id): void
    {
        $garageType = GarageType::query()->findOrFail($id);

        $garageType->delete();
    }
}
