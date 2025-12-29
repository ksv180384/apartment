<?php

namespace App\Http\Resources\App\Property;

use App\Http\Resources\App\Media\ImageUrlResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertyShowFeatureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'area_total' => $this->area_total_formatted,
            'property_id' => $this->property_id,
            'year_built' => $this->year_built,
        ];
    }
}
