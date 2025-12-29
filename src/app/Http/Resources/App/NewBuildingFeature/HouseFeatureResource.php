<?php

namespace App\Http\Resources\App\NewBuildingFeature;

use App\Http\Resources\App\Media\ImageUrlResource;
use App\Http\Resources\App\NameListResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HouseFeatureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'land_area' => (int)$this->land_area,
            'bedrooms_total' => $this->bedrooms_total,
            'wall_material' => $this->wall_material,
            'roof_material' => $this->roof_material,
            'building_floors' => $this->building_floors,
            'finishing_type' => NameListResource::make($this->finishingType),
            'area_living' => $this->area_living,
            'bathrooms_total' => $this->bathrooms_total,
            'ceiling_height' => $this->ceiling_height_formatted,
            'has_electricity' => $this->has_electricity,
            'has_water_supply' => $this->has_water_supply,
            'has_sewage' => $this->has_sewage,
            'has_heating' => $this->has_heating,
            'has_gas' => $this->has_gas,
            'has_internet' => $this->has_internet,
            'has_phone_line' => $this->has_phone_line,
            'has_garage' => $this->has_garage,
            'has_basement' => $this->has_basement,
            'has_attic' => $this->has_attic,
            'has_balcony' => $this->has_balcony,
            'has_terrace' => $this->has_terrace,
            'has_veranda' => $this->has_veranda,
            'has_pool' => $this->has_pool,
            'has_sauna' => $this->has_sauna,
            'has_fireplace' => $this->has_fireplace,
            'has_fence' => $this->has_fence,
            'has_garden' => $this->has_garden,
            'has_vegetable_garden' => $this->has_vegetable_garden,
            'has_lawn' => $this->has_lawn,
            'has_playground' => $this->has_playground,
            'has_parking' => $this->has_parking,
            'foundation_type' => $this->foundation_type,
        ];
    }
}
