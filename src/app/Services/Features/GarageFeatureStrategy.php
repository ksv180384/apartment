<?php

namespace App\Services\Features;

use App\Models\Property;
use App\Services\GarageFeatureService;

class GarageFeatureStrategy implements FeatureStrategyInterface
{
    public function create(Property $property, array $subData): void
    {
        $subData['property_id'] = $property->id;
        (new GarageFeatureService())->create($subData);
    }

    public function update(Property $property, array $subData): void
    {
        $feature = $property->garageFeatures;

        if ($feature) {
            (new GarageFeatureService())->update($feature->id, $subData);
        } else {
            $this->create($property, $subData);
        }
    }

    public function delete(int $id): void
    {
        (new GarageFeatureService())->destroy($id);
    }
}
