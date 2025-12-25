<?php

namespace App\Http\Resources\App\NewBuildingFeature;

use App\Http\Resources\App\Media\ImageUrlResource;
use App\Http\Resources\App\NameListResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommercialFeatureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'commercial_type' => NameListResource::make($this->commercialType), //Тип: 'офис', 'магазин', 'склад', 'ресторан'
            'purpose' => NameListResource::make($this->purpose),// Назначение: 'розничная торговля', 'офисы', 'производство'
            'layout_type' => NameListResource::make($this->layoutType), // Планировка: 'open space', 'кабинеты'
            'has_ventilation' => $this->has_ventilation, // Вентиляция
            'has_air_conditioning' => $this->has_air_conditioning, // Кондиционирование
            'has_security' => $this->has_security, // Охрана
            'has_parking' => $this->has_parking, // Парковка
            'parking_spaces' => $this->parking_spaces, // Количество парковочных мест
        ];
    }
}
