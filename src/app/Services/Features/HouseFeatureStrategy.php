<?php

namespace App\Services\Features;

use App\Models\Property;
use App\Services\HouseFeatureService;

class HouseFeatureStrategy implements FeatureStrategyInterface
{
    public function create(Property $property, array $subData): void
    {
        $subData['property_id'] = $property->id;
        (new HouseFeatureService())->create($subData);
    }

    public function update(Property $property, array $subData): void
    {
        $feature = $property->houseFeatures;

        if ($feature) {
            (new HouseFeatureService())->update($feature->id, $subData);
        } else {
            $this->create($property, $subData);
        }
    }

    public function delete(int $id): void
    {
        (new HouseFeatureService())->destroy($id);
    }
}
