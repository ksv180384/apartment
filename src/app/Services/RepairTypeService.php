<?php

namespace App\Services;

use App\Models\Condition;
use App\Models\RepairType;
use Illuminate\Database\Eloquent\Collection;

class RepairTypeService
{
    public function repairTypes(): Collection
    {
        $repairTypes = RepairType::query()
            ->orderBy('name')
            ->get();

        return $repairTypes;
    }

    public function repairTypesList(): Collection
    {
        $repairTypes = RepairType::query()
            ->orderBy('name')
            ->get(['id', 'name', 'slug']);

        return $repairTypes;
    }

    public function create(array $repairTypeData): RepairType
    {
        $repairType = RepairType::query()->create($repairTypeData);

        return $repairType;
    }

    public function update(int $id, array $repairTypeData): RepairType
    {
        $repairType = RepairType::query()->findOrFail($id);

        $repairType->update($repairTypeData);

        return $repairType;
    }

    public function destroy(int $id): void
    {
        $repairType = RepairType::query()->findOrFail($id);

        $repairType->delete();
    }
}
