<?php

namespace App\Services;

use App\Models\Condition;
use Illuminate\Database\Eloquent\Collection;

class ConditionService
{
    public function conditions(): Collection
    {
        $conditions = Condition::query()
            ->orderBy('name')
            ->get();

        return $conditions;
    }

    public function conditionsList(): Collection
    {
        $conditions = Condition::query()
            ->orderBy('name')
            ->get(['id', 'name', 'slug']);

        return $conditions;
    }

    public function create(array $conditionData): Condition
    {
        $condition = Condition::query()->create($conditionData);

        return $condition;
    }

    public function update(int $id, array $conditionData): Condition
    {
        $condition = Condition::query()->findOrFail($id);

        $condition->update($conditionData);

        return $condition;
    }

    public function destroy(int $id): void
    {
        $condition = Condition::query()->findOrFail($id);

        $condition->delete();
    }
}
