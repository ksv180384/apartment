<?php

namespace App\Services\Features;

use App\Models\Property;
use App\Services\CommercialFeatureService;

class CommercialFeatureStrategy implements FeatureStrategyInterface
{
    public function create(Property $property, array $subData): void
    {
        $subData['property_id'] = $property->id;
        (new CommercialFeatureService())->create($subData);
    }

    public function update(Property $property, array $subData): void
    {
        $feature = $property->commercialFeature;

        if ($feature) {
            (new CommercialFeatureService())->update($feature->id, $subData);
        } else {
            $this->create($property, $subData);
        }
    }
}
