<?php

namespace App\Services;

use App\Models\NewBuildingFeature;

//novostroiki
class NewBuildingFeatureService
{

    public function create(array $newBuildingFeature): NewBuildingFeature
    {
        $newBuildingFeature = NewBuildingFeature::query()->create([
            'completion_date' => $newBuildingFeature['completion_date'] ?? null,
            'building_name' => $newBuildingFeature['building_name'] ?? null,
            'developer' => $newBuildingFeature['developer'] ?? null,
            'building_class_id' => $newBuildingFeature['building_class_id'] ?? null,
            'building_type_id' => $newBuildingFeature['building_type_id'] ?? null,
            'building_floors' => $newBuildingFeature['building_floors'] ?? null,
            'apartments_total' => $newBuildingFeature['apartments_total'] ?? null,
            'finishing_type_id' => $newBuildingFeature['finishing_type_id'] ?? null,
            'has_installment' => $newBuildingFeature['has_installment'] ?? null,
            'has_mortgage' => $newBuildingFeature['has_mortgage'] ?? null,
            'has_balcony' => $newBuildingFeature['has_balcony'] ?? null,
            'has_loggia' => $newBuildingFeature['has_loggia'] ?? null,
        ]);

        return $newBuildingFeature;
    }
}
