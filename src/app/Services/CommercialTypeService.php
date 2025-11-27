<?php

namespace App\Services;

use App\Models\CommercialType;
use App\Models\Condition;
use App\Models\RepairType;
use Illuminate\Database\Eloquent\Collection;

class CommercialTypeService
{
    public function commercialTypes(): Collection
    {
        $commercialTypes = CommercialType::query()
            ->orderBy('name')
            ->get();

        return $commercialTypes;
    }

    public function commercialTypesList(): Collection
    {
        $commercialTypes = CommercialType::query()
            ->orderBy('name')
            ->get(['id', 'name', 'slug']);

        return $commercialTypes;
    }

    public function create(array $commercialTypeData): CommercialType
    {
        $commercialType = CommercialType::query()->create($commercialTypeData);

        return $commercialType;
    }

    public function update(int $id, array $commercialTypeData): CommercialType
    {
        $commercialType = CommercialType::query()->findOrFail($id);

        $commercialType->update($commercialTypeData);

        return $commercialType;
    }

    public function destroy(int $id): void
    {
        $commercialType = CommercialType::query()->findOrFail($id);

        $commercialType->delete();
    }
}
