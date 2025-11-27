<?php

namespace App\Services;

use App\Models\Condition;
use App\Models\Property;
use App\Models\RepairType;
use Illuminate\Database\Eloquent\Collection;

class PropertyService
{
    const PAGINATION_LIMIT = 20;

    public function propertiesPagination(): \Illuminate\Pagination\LengthAwarePaginator
    {
        $properties = Property::query()
            ->orderBy('created_at')
            ->paginate(self::PAGINATION_LIMIT);

        return $properties;
    }

    public function create(array $propertyData): Property
    {
        $property = Property::query()->create($propertyData);

        return $property;
    }

    public function update(int $id, array $propertyData): Property
    {
        $property = Property::query()->findOrFail($id);

        $property->update($propertyData);

        return $property;
    }

    public function destroy(int $id): void
    {
        $property = Property::query()->findOrFail($id);

        $property->delete();
    }
}
