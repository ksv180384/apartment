<?php

namespace App\Services\Features;

use App\Models\Property;

interface FeatureStrategyInterface
{

    public function create(Property $property, array $subData): void;
    public function update(Property $property, array $subData): void;
}
