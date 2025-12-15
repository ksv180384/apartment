<?php

namespace App\Services\Features;

use App\Models\Property;
use App\Services\NewBuildingFeatureService;

class NewBuildingFeatureStrategy implements FeatureStrategyInterface
{
    public function create(Property $property, array $subData): void
    {
        $subData['property_id'] = $property->id;
        (new NewBuildingFeatureService)->create($subData);
    }

    public function update(Property $property, array $subData): void
    {
        $feature = $property->newBuildingFeatures;

        if ($feature) {
            (new NewBuildingFeatureService)->update($feature->id, $subData);
        } else {
            $this->create($property, $subData);
        }
    }
}
