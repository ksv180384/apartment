<?php

namespace App\Http\Resources\App\NewBuildingFeature;

use App\Http\Resources\App\Media\ImageUrlResource;
use App\Http\Resources\App\NameListResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GarageFeatureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'garage_type' => NameListResource::make($this->garageType), //  Тип: 'отдельный', 'в кооперативе', 'подземный'
            'ownership_type' => NameListResource::make($this->ownershipType), // Форма собственности: 'собственность', 'аренда'
            'gate_height' => $this->gate_height_formatted, // Высота ворот
            'gate_width' => $this->gate_width_formatted, // Ширина ворот
            'vehicle_capacity' => $this->vehicle_capacity, //  Вместимость (количество машин)
            'equipment' => $this->equipment, // Оборудование
            'has_electricity' => $this->has_electricity, // Электричество
            'has_heating' => $this->has_heating, // Отопление
            'has_water_supply' => $this->has_water_supply, // Водоснабжение
            'has_sewage' => $this->has_sewage, // Канализация
            'has_ventilation' => $this->has_ventilation, // Вентиляция
        ];
    }
}
