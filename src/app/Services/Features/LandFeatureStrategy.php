<?php

namespace App\Services\Features;

use App\Models\Property;
use App\Services\LandFeatureService;

class LandFeatureStrategy implements FeatureStrategyInterface
{
    public function create(Property $property, array $subData): void
    {
        $subData['property_id'] = $property->id;
        (new LandFeatureService)->create($subData);
    }

    public function update(Property $property, array $subData): void
    {
        $feature = $property->landFeature;

        if ($feature) {
            (new LandFeatureService)->update($feature->id, $subData);
        } else {
            $this->create($property, $subData);
        }
    }
}
