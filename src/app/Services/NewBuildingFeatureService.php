<?php

namespace App\Services;

use App\Models\NewBuildingFeature;

//novostroiki
class NewBuildingFeatureService
{

    public function create(array $newBuildingFeatureData): NewBuildingFeature
    {
        $newBuildingFeature = NewBuildingFeature::query()->create([
            'property_id' => $newBuildingFeatureData['property_id'] ?? null,
            'completion_date' => $newBuildingFeatureData['completion_date'] ?? null,
            'building_name' => $newBuildingFeatureData['building_name'] ?? null,
            'developer' => $newBuildingFeatureData['developer'] ?? null,
            'building_class_id' => $newBuildingFeatureData['building_class_id'] ?? null,
            'building_type_id' => $newBuildingFeatureData['building_type_id'] ?? null,
            'building_floors' => $newBuildingFeatureData['building_floors'] ?? null,
            'apartments_total' => $newBuildingFeatureData['apartments_total'] ?? null,
            'finishing_type_id' => $newBuildingFeatureData['finishing_type_id'] ?? null,
            'has_installment' => $newBuildingFeatureData['has_installment'] ?? null,
            'has_mortgage' => $newBuildingFeatureData['has_mortgage'] ?? null,
            'has_balcony' => $newBuildingFeatureData['has_balcony'] ?? null,
            'has_loggia' => $newBuildingFeatureData['has_loggia'] ?? null,
        ]);

        return $newBuildingFeature;
    }

    public function update(int $id, array $newBuildingFeatureData): NewBuildingFeature
    {
        $newBuildingFeature = NewBuildingFeature::query()->findOrFail($id);
        $newBuildingFeature->update($newBuildingFeatureData);

        return $newBuildingFeature;
    }

    public function destroy(int $id)
    {
        $feature = NewBuildingFeature::where('property_id', $id)->first();

        if ($feature) {
            $feature->delete();
        }
    }
}
