<?php

namespace App\Services;

use App\Models\FinishingType;
use App\Models\Purpose;
use Illuminate\Database\Eloquent\Collection;

class FinishingTypeService
{
    public function finishingTypes(): Collection
    {
        $purpose = FinishingType::query()
            ->orderBy('name')
            ->get();

        return $purpose;
    }

    public function finishingTypesList(): Collection
    {
        $purpose = FinishingType::query()
            ->orderBy('name')
            ->get(['id', 'name', 'slug']);

        return $purpose;
    }

    public function create(array $finishingTypeData): FinishingType
    {
        $finishingType = FinishingType::query()->create($finishingTypeData);

        return $finishingType;
    }

    public function update(int $id, array $finishingTypeData): FinishingType
    {
        $finishingType = FinishingType::query()->findOrFail($id);

        $finishingType->update($finishingTypeData);

        return $finishingType;
    }

    public function destroy(int $id): void
    {
        $finishingType = FinishingType::query()->findOrFail($id);

        $finishingType->delete();
    }
}
