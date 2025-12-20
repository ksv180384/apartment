<?php

namespace App\Http\Resources\Admin\Property;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertyEditResource extends JsonResource
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
            'category_id' => $this->category_id,
            'property_type_id' => $this->property_type_id,
            'user_id' => $this->user_id,
            'is_published' => $this->is_published,
            'views_count' => $this->views_count,
            'media' => $this->image_url_all,
            'address' => $this->address,
            'sub_data' => $this->sub_data,
        ];
    }
}
