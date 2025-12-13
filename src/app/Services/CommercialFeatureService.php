<?php

namespace App\Services;

// kommerceskaia-nedvizimost
use App\Models\CommercialFeature;

class CommercialFeatureService
{

    public function create(array $commercialFeatureData): CommercialFeature
    {
        $commercialFeature = CommercialFeature::query()->create([
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
}
