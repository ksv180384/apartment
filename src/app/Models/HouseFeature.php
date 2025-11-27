<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;

class HouseFeature extends Model
{
    protected $fillable = [
        'property_id',
        'land_area', // Площадь участка в сотках
        'bedrooms_total', // Количество спален
        'wall_material', // Материал стен
        'roof_material', // Материал крыши
        'has_electricity', // Электричество
        'has_water_supply', // Водоснабжение
        'has_sewage',  // Канализация
        'has_heating', // Отопление
        'has_gas', // Газ
        'has_internet', // Интернет
        'has_phone_line', // Телефонная линия
        'has_garage', // Гараж
        'has_basement', // Подвал
        'has_attic', // Чердак/мансарда
        'has_balcony', // Балкон
        'has_terrace', // Терраса
        'has_veranda', // Веранда
        'has_pool', // Бассейн
        'has_sauna', // Сауна/баня
        'has_fireplace', // Камин
        'has_fence', // Ограждение
        'has_garden', // Сад
        'has_vegetable_garden', // Огород
        'has_lawn', // Газон
        'has_playground', // Детская площадка
        'has_parking', // Парковка
        'foundation_type', // Тип фундамента
    ];

    protected $casts = [
        'land_area' => 'decimal:2',
        'bedrooms_total' => 'integer',
        'ceiling_height' => 'decimal:2',
        'has_electricity' => 'boolean',
        'has_water_supply' => 'boolean',
        'has_sewage' => 'boolean',
        'has_heating' => 'boolean',
        'has_gas' => 'boolean',
        'has_internet' => 'boolean',
        'has_phone_line' => 'boolean',
        'has_garage' => 'boolean',
        'has_basement' => 'boolean',
        'has_attic' => 'boolean',
        'has_balcony' => 'boolean',
        'has_terrace' => 'boolean',
        'has_veranda' => 'boolean',
        'has_pool' => 'boolean',
        'has_sauna' => 'boolean',
        'has_fireplace' => 'boolean',
        'has_fence' => 'boolean',
        'has_garden' => 'boolean',
        'has_vegetable_garden' => 'boolean',
        'has_lawn' => 'boolean',
        'has_playground' => 'boolean',
        'has_parking' => 'boolean',
    ];

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }
}
