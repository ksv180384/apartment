<?php

namespace App\Http\Resources\Admin\GarageType;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GarageTypeListResource extends JsonResource
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
            'name' => $this->name,
            'slug' => $this->slug,
        ];
    }
}
