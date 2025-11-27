<?php

namespace App\Services;

use App\Models\Condition;
use App\Models\OwnershipType;
use App\Models\RepairType;
use Illuminate\Database\Eloquent\Collection;

class OwnershipTypeService
{
    public function ownershipTypes(): Collection
    {
        $ownershipTypes = OwnershipType::query()
            ->orderBy('name')
            ->get();

        return $ownershipTypes;
    }

    public function ownershipTypesList(): Collection
    {
        $ownershipTypes = OwnershipType::query()
            ->orderBy('name')
            ->get(['id', 'name', 'slug']);

        return $ownershipTypes;
    }

    public function create(array $ownershipTypeData): OwnershipType
    {
        $ownershipType = OwnershipType::query()->create($ownershipTypeData);

        return $ownershipType;
    }

    public function update(int $id, array $ownershipTypeData): OwnershipType
    {
        $ownershipType = OwnershipType::query()->findOrFail($id);

        $ownershipType->update($ownershipTypeData);

        return $ownershipType;
    }

    public function destroy(int $id): void
    {
        $ownershipType = OwnershipType::query()->findOrFail($id);

        $ownershipType->delete();
    }
}
