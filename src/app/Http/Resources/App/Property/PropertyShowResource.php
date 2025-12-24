<?php

namespace App\Http\Resources\App\Property;

use App\Http\Resources\App\Media\ImageUrlResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertyShowResource extends JsonResource
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
            'title' => $this->title,
            'main_image_url' => $this->main_image_url,
            'description' => $this->description,
            'price' => $this->formatted_price,
            'category' => PropertyShowCategoryResource::make($this->category),
            'property_type' => $this->property_type,
            'features' => PropertyShowFeatureResource::make($this->features),
            'media' => ImageUrlResource::collection($this->image_url_all),
            'media_mini' => ImageUrlResource::collection($this->image_url_mini),
            'address' => $this->address,
            'coordinates' => $this->address?->latitude && $this->address?->longitude
                ? [$this->address->latitude, $this->address->longitude]
                : null,
            'sub_data' => $this->sub_data,
        ];
    }
}
