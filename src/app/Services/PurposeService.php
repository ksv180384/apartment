<?php

namespace App\Services;

use App\Models\Condition;
use App\Models\Purpose;
use App\Models\RepairType;
use Illuminate\Database\Eloquent\Collection;

class PurposeService
{
    public function purposes(): Collection
    {
        $purpose = Purpose::query()
            ->orderBy('name')
            ->get();

        return $purpose;
    }

    public function purposesList(): Collection
    {
        $purpose = Purpose::query()
            ->orderBy('name')
            ->get(['id', 'name', 'slug']);

        return $purpose;
    }

    public function create(array $purposeData): Purpose
    {
        $purpose = Purpose::query()->create($purposeData);

        return $purpose;
    }

    public function update(int $id, array $purposeData): Purpose
    {
        $purpose = Purpose::query()->findOrFail($id);

        $purpose->update($purposeData);

        return $purpose;
    }

    public function destroy(int $id): void
    {
        $purpose = Purpose::query()->findOrFail($id);

        $purpose->delete();
    }
}
