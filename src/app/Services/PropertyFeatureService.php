<?php

namespace App\Services;

use App\Models\PropertyFeature;
use App\Models\PropertyType;

class PropertyFeatureService
{
    public function create(array $propertyFeatureData): PropertyFeature
    {
        $propertyFeature = PropertyFeature::query()->create([
            'property_id' => $propertyFeatureData['property_id'] ?? null,
            'area_total' => $propertyFeatureData['area_total'] ?? null,
            'year_built' => $propertyFeatureData['year_built'] ?? null,
        ]);

        return $propertyFeature;
    }

    public function update(int $id = null, array $propertyFeatureData = []): PropertyFeature
    {
        if(!$id){
            return $this->create($propertyFeatureData);
        }

        $propertyFeature = PropertyFeature::query()->findOrFail($id);
        $propertyFeature->update($propertyFeatureData);

        return $propertyFeature;
    }
}
