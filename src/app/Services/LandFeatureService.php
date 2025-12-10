<?php

namespace App\Services;

use App\Models\LandFeature;

// ucastki
class LandFeatureService
{

    public function create(array $landFeatureData): LandFeature
    {
        $landFeature = LandFeature::query()->create([
            'land_area' => $landFeatureData['land_area'] ?? null,
            'land_category' => $landFeatureData['land_category'] ?? null,
            'permitted_use' => $landFeatureData['permitted_use'] ?? null,
            'relief' => $landFeatureData['relief'] ?? null,
            'soil_type' => $landFeatureData['soil_type'] ?? null,
            'has_utilities' => $landFeatureData['has_utilities'] ?? null,
            'has_road_access' => $landFeatureData['has_road_access'] ?? null,
            'has_fence' => $landFeatureData['has_fence'] ?? null,
        ]);

        return $landFeature;
    }
}
