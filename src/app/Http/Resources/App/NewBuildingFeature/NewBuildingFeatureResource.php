<?php

namespace App\Http\Resources\App\NewBuildingFeature;

use App\Http\Resources\App\Media\ImageUrlResource;
use App\Http\Resources\App\NameListResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NewBuildingFeatureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'completion_date' => $this->completion_date->format('d.m.Y'),
            'building_name' => $this->building_name,
            'developer' => $this->developer,
            'building_class' => NameListResource::make($this->buildingClass),
            'building_type' => NameListResource::make($this->buildingType),
            'building_floors' => $this->building_floors,
            'floor' => $this->floor,
            'area_living' => $this->area_living,
            'area_kitchen' => $this->area_kitchen,
            'rooms_total' => $this->rooms_total,
            'bathrooms_total' => $this->bathrooms_total,
            'ceiling_height' => $this->ceiling_height_formatted,
            'apartments_total' => $this->apartments_total,
            'finishing_type' => $this->finishingType,
            'has_installment' => $this->has_installment,
            'has_mortgage' => $this->has_mortgage,
            'has_balcony' => $this->has_balcony,
            'has_loggia' => $this->has_loggia,
        ];
    }
}
