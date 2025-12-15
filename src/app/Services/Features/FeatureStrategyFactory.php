<?php

namespace App\Services\Features;

class FeatureStrategyFactory
{
    public static function make(string $propertyTypeSlug): ?FeatureStrategyInterface
    {
        return match($propertyTypeSlug) {
            'novostroiki', 'kvartiry', 'komnaty' => app(NewBuildingFeatureStrategy::class),
            'doma' => app(HouseFeatureStrategy::class),
            'uchastki' => app(LandFeatureStrategy::class),
            'kommerceskaia-nedvizimost' => app(CommercialFeatureStrategy::class),
            'garazi' => app(GarageFeatureStrategy::class),
            default => null,
        };
    }
}
