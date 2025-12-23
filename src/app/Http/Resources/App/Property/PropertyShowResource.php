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
            'description' => $this->description,
            'price' => $this->price,
            'category' => $this->category,
            'property_type' => $this->property_type,
            'features' => $this->features,
            'media' => ImageUrlResource::collection($this->image_url_all),
            'media_mini' => ImageUrlResource::collection($this->image_url_all_mini),
            'address' => $this->address,
            'sub_data' => $this->sub_data,
        ];
    }
}
