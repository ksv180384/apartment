<?php

namespace App\Services;

// kommerceskaia-nedvizimost
use App\Models\CommercialFeature;

class CommercialFeatureService
{

    public function create(array $commercialFeatureData): CommercialFeature
    {
        $commercialFeature = CommercialFeature::query()->create([
            'property_id' => $commercialFeatureData['property_id'] ?? null,
            'commercial_type_id' => $commercialFeatureData['commercial_type_id'] ?? null,
            'purpose_id' => $commercialFeatureData['purpose_id'] ?? null,
            'parking_spaces' => $commercialFeatureData['parking_spaces'] ?? null,
            'layout_type_id' => $commercialFeatureData['layout_type_id'] ?? null,
            'has_ventilation' => $commercialFeatureData['has_ventilation'] ?? null,
            'has_air_conditioning' => $commercialFeatureData['has_air_conditioning'] ?? null,
            'has_security' => $commercialFeatureData['has_security'] ?? null,
            'has_parking' => $commercialFeatureData['has_parking'] ?? null,
        ]);

        return $commercialFeature;
    }

    public function update(int $id, array $commercialFeatureData): CommercialFeature
    {
        $commercialFeature = CommercialFeature::query()->findOrFail($id);
        $commercialFeature->update($commercialFeatureData);

        return $commercialFeature;
    }

    public function destroy(int $id)
    {
        $feature = CommercialFeature::where('property_id', $id)->first();

        if ($feature) {
            $feature->delete();
        }
    }
}
