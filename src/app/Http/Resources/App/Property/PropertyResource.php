<?php

namespace App\Http\Resources\App\Property;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertyResource extends JsonResource
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
            'price' => $this->formatted_price,
            'category' => $this->category->name ?? '',
            'property_type' => $this->propertyType->name ?? '',
            'property_slug' => $this->propertyType->slug ?? '',
            'user' => $this->user->email ?? '',
            'image_main' => $this->main_image_url_mini ?? '',
            'address' => $this->address->fullAddress ?? '',
            'coordinates' => [$this->address?->latitude ?? null, $this->address?->longitude ?? null],
            'is_published' => $this->is_published,
            'views_count' => $this->views_count,
            'area_total_formatted' => $this->features->area_total_formatted,
        ];
    }
}
