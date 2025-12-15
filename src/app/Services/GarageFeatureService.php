<?php

namespace App\Services;

use App\Models\GarageFeature;

class GarageFeatureService
{

    public function create(array $garageFeatureData): GarageFeature
    {
        $garageFeature = GarageFeature::query()->create([
            'property_id' => $garageFeatureData['property_id'] ?? null,
            'garage_type_id' => $garageFeatureData['garage_type_id'] ?? null,
            'ownership_type_id' => $garageFeatureData['ownership_type_id'] ?? null,
            'equipment' => $garageFeatureData['equipment'] ?? null,
            'gate_height' => $garageFeatureData['gate_height'] ?? null,
            'gate_width' => $garageFeatureData['gate_width'] ?? null,
            'vehicle_capacity' => $garageFeatureData['vehicle_capacity'] ?? null,
            'has_electricity' => $garageFeatureData['has_electricity'] ?? null,
            'has_heating' => $garageFeatureData['has_heating'] ?? null,
            'has_water_supply' => $garageFeatureData['has_water_supply'] ?? null,
        ]);

        return $garageFeature;
    }

    public function update(int $id, array $garageFeatureData): GarageFeature
    {
        $garageFeature = GarageFeature::query()->findOrFail($id);
        $garageFeature->update($garageFeatureData);

        return $garageFeature;
    }
}
