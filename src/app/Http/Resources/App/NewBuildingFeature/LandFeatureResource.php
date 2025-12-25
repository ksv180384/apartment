<?php

namespace App\Http\Resources\App\NewBuildingFeature;

use App\Http\Resources\App\Media\ImageUrlResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LandFeatureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'land_area' => (int)$this->land_area, // Площадь участка
            'land_category' => $this->land_category, // Категория земли: 'ИЖС', 'СНТ', 'ЛПХ', 'коммерческая'
            'permitted_use' => $this->permitted_use, // Разрешенное использование
            'has_utilities' => $this->has_utilities, // Коммуникации
            'relief' => $this->relief, // Рельеф: 'ровный', 'холмистый'
            'soil_type' => $this->soil_type, // Тип почвы
            'has_road_access' => $this->has_road_access, // Подъездные пути
            'has_fence' => $this->has_fence, // Ограждение
        ];
    }
}
