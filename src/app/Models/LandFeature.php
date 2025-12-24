<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class LandFeature extends Model
{
    protected $fillable = [
        'property_id',
        'land_area', // Площадь участка
        'land_category', // Категория земли: 'ИЖС', 'СНТ', 'ЛПХ', 'коммерческая'
        'permitted_use', // Разрешенное использование
        'has_utilities', // Коммуникации
        'relief', // Рельеф: 'ровный', 'холмистый'
        'soil_type', // Тип почвы
        'has_road_access', // Подъездные пути
        'has_fence', // Ограждение
    ];

    protected $casts = [
        'land_area' => 'decimal:2',
        'has_utilities' => 'boolean',
        'has_phone_line' => 'boolean',
        'has_road_access' => 'boolean',
        'has_fence' => 'boolean',
    ];

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }
}
