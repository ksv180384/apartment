<?php

namespace App\Services;

use App\Models\HouseFeature;

// doma
class HouseFeatureService
{

    public function create(array $houseFeatureData): HouseFeature
    {
        $houseFeature = HouseFeature::query()->create([
            'property_id' => $houseFeatureData['property_id'] ?? null,
            'land_area' => $houseFeatureData['land_area'] ?? null,
            'bedrooms_total' => $houseFeatureData['bedrooms_total'] ?? null,
            'building_floors' => $houseFeatureData['building_floors'] ?? null,
            'finishing_type_id' => $houseFeatureData['finishing_type_id'] ?? null,
            'area_living' => $houseFeatureData['area_living'] ?? null,
            'bathrooms_total' => $houseFeatureData['bathrooms_total'] ?? null,
            'ceiling_height' => $houseFeatureData['ceiling_height'] ?? null,
            'wall_material' => $houseFeatureData['wall_material'] ?? null,
            'roof_material' => $houseFeatureData['roof_material'] ?? null,
            'foundation_type' => $houseFeatureData['foundation_type'] ?? null,
            'has_electricity' => $houseFeatureData['has_electricity'] ?? null,
            'has_water_supply' => $houseFeatureData['has_water_supply'] ?? null,
            'has_sewage' => $houseFeatureData['has_sewage'] ?? null,
            'has_heating' => $houseFeatureData['has_heating'] ?? null,
            'has_gas' => $houseFeatureData['has_gas'] ?? null,
            'has_internet' => $houseFeatureData['has_internet'] ?? null,
            'has_phone_line' => $houseFeatureData['has_phone_line'] ?? null,
            'has_garage' => $houseFeatureData['has_garage'] ?? null,
            'has_basement' => $houseFeatureData['has_basement'] ?? null,
            'has_attic' => $houseFeatureData['has_attic'] ?? null,
            'has_balcony' => $houseFeatureData['has_balcony'] ?? null,
            'has_terrace' => $houseFeatureData['has_terrace'] ?? null,
            'has_veranda' => $houseFeatureData['has_veranda'] ?? null,
            'has_pool' => $houseFeatureData['has_pool'] ?? null,
            'has_sauna' => $houseFeatureData['has_sauna'] ?? null,
            'has_fireplace' => $houseFeatureData['has_fireplace'] ?? null,
            'has_fence' => $houseFeatureData['has_fence'] ?? null,
            'has_garden' => $houseFeatureData['has_garden'] ?? null,
            'has_vegetable_garden' => $houseFeatureData['has_vegetable_garden'] ?? null,
            'has_lawn' => $houseFeatureData['has_lawn'] ?? null,
            'has_playground' => $houseFeatureData['has_playground'] ?? null,
            'has_parking' => $houseFeatureData['has_parking'] ?? null,
        ]);

        return $houseFeature;
    }

    public function update(int $id, array $houseFeatureData): HouseFeature
    {
        $houseFeature = HouseFeature::query()->findOrFail($id);
        $houseFeature->update([
            'land_area' => $houseFeatureData['land_area'] ?? null,
            'bedrooms_total' => $houseFeatureData['bedrooms_total'] ?? null,
            'building_floors' => $houseFeatureData['building_floors'] ?? null,
            'finishing_type_id' => $houseFeatureData['finishing_type_id'] ?? null,
            'area_living' => $houseFeatureData['area_living'] ?? null,
            'bathrooms_total' => $houseFeatureData['bathrooms_total'] ?? null,
            'ceiling_height' => $houseFeatureData['ceiling_height'] ?? null,
            'wall_material' => $houseFeatureData['wall_material'] ?? null,
            'roof_material' => $houseFeatureData['roof_material'] ?? null,
            'foundation_type' => $houseFeatureData['foundation_type'] ?? null,
            'has_electricity' => $houseFeatureData['has_electricity'] ?? null,
            'has_water_supply' => $houseFeatureData['has_water_supply'] ?? null,
            'has_sewage' => $houseFeatureData['has_sewage'] ?? null,
            'has_heating' => $houseFeatureData['has_heating'] ?? null,
            'has_gas' => $houseFeatureData['has_gas'] ?? null,
            'has_internet' => $houseFeatureData['has_internet'] ?? null,
            'has_phone_line' => $houseFeatureData['has_phone_line'] ?? null,
            'has_garage' => $houseFeatureData['has_garage'] ?? null,
            'has_basement' => $houseFeatureData['has_basement'] ?? null,
            'has_attic' => $houseFeatureData['has_attic'] ?? null,
            'has_balcony' => $houseFeatureData['has_balcony'] ?? null,
            'has_terrace' => $houseFeatureData['has_terrace'] ?? null,
            'has_veranda' => $houseFeatureData['has_veranda'] ?? null,
            'has_pool' => $houseFeatureData['has_pool'] ?? null,
            'has_sauna' => $houseFeatureData['has_sauna'] ?? null,
            'has_fireplace' => $houseFeatureData['has_fireplace'] ?? null,
            'has_fence' => $houseFeatureData['has_fence'] ?? null,
            'has_garden' => $houseFeatureData['has_garden'] ?? null,
            'has_vegetable_garden' => $houseFeatureData['has_vegetable_garden'] ?? null,
            'has_lawn' => $houseFeatureData['has_lawn'] ?? null,
            'has_playground' => $houseFeatureData['has_playground'] ?? null,
            'has_parking' => $houseFeatureData['has_parking'] ?? null,
        ]);

        return $houseFeature;
    }
}
