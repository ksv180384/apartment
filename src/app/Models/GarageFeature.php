<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;

// Характеристик гаражей
class GarageFeature extends Model
{
    protected $fillable = [
        'property_id', //
        'garage_type_id', //  Тип: 'отдельный', 'в кооперативе', 'подземный'
        'ownership_type_id', // Форма собственности: 'собственность', 'аренда'
        'gate_height', // Высота ворот
        'gate_width', // Ширина ворот
        'vehicle_capacity', //  Вместимость (количество машин)
        'equipment', // Оборудование
        'has_electricity', // Электричество
        'has_heating', // Отопление
        'has_water_supply', // Водоснабжение
        'has_sewage', // Канализация
        'has_ventilation', // Вентиляция
    ];

    protected $casts = [
        'gate_height' => 'decimal:2', //
        'gate_width' => 'decimal:2', //
        'vehicle_capacity' => 'integer', //
        'has_electricity' => 'boolean', //
        'has_heating' => 'boolean', //
        'has_water_supply' => 'boolean', //
        'has_sewage' => 'boolean', //
        'has_ventilation' => 'boolean', //
    ];

    /**
     * Объект недвижимости (гараж)
     */
    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

    /**
     * Тип гаража
     */
//    protected function garageTypeLabel(): Attribute
//    {
//        return Attribute::make(
//            get: function () {
//                return match($this->garage_type) {
//                    'separate' => 'Отдельно стоящий',
//                    'cooperative' => 'В гаражном кооперативе',
//                    'underground' => 'Подземный в паркинге',
//                    'multilevel' => 'В многоуровневом паркинге',
//                    'box' => 'Бокс в гаражном массиве',
//                    'carport' => 'Навес',
//                    'built_in' => 'Встроенный в здание',
//                    'attached' => 'Пристроенный к дому',
//                    'container' => 'Контейнерный',
//                    'modular' => 'Модульный',
//                    'underground_bunker' => 'Подземный бункер',
//                    default => 'Не указан'
//                };
//            },
//        );
//    }

    /**
     * Тип собственности
     */
    protected function ownershipTypeLabel(): Attribute
    {
        return Attribute::make(
            get: function () {
                return match($this->ownership_type) {
                    'ownership' => 'Собственность',
                    'lease' => 'Аренда',
                    'cooperative_share' => 'Пай в кооперативе',
                    'state' => 'Государственная',
                    'municipal' => 'Муниципальная',
                    'right_of_use' => 'Право пользования',
                    default => 'Не указано'
                };
            },
        );
    }

    /**
     * Размеры ворот
     */
    protected function gateDimensionsFormatted(): Attribute
    {
        return Attribute::make(
            get: function () {
                if (!$this->gate_width || !$this->gate_height) {
                    return null;
                }
                return number_format($this->gate_width, 1, ',', ' ') . '×' .
                    number_format($this->gate_height, 1, ',', ' ') . ' м';
            },
        );
    }

    /**
     * Сводка по коммуникациям
     */
    protected function utilitiesSummary(): Attribute
    {
        return Attribute::make(
            get: function () {
                $utilities = [];

                if ($this->has_electricity) $utilities[] = 'электричество';
                if ($this->has_water_supply) $utilities[] = 'водоснабжение';
                if ($this->has_sewage) $utilities[] = 'канализация';
                if ($this->has_heating) $utilities[] = 'отопление';
                if ($this->has_ventilation) $utilities[] = 'вентиляция';

                return $utilities ? implode(', ', $utilities) : 'Коммуникации не подключены';
            },
        );
    }
}
