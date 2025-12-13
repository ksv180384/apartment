<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;

// Новостройки
class NewBuildingFeature extends Model
{
    protected $fillable = [
        'property_id',
        'area_living', // Жилая площадь в м²
        'area_kitchen', // Жилая кухни в м²
        'completion_date', // Дата сдачи дома
        'building_name',// Название ЖК
        'developer', // Застройщик
        'building_class_id', // Класс жилья: 'эконом', 'комфорт', 'бизнес', 'элит'
        'building_type_id', // Тип дома: 'Монолитный', 'Панельный', 'Кирпичный', 'Блочный', ...
        'building_floors', // Этажность дома
        'floor', // Этаж
        'apartments_total', // Количество квартир в доме
        'rooms_total', // Количество комнат
        'bathrooms_total', // Количество санузлов
        'finishing_type_id', // Тип отделки: 'без отделки', 'чистовая', 'под ключ'
        'ceiling_height', // Высота потолков
        'has_installment', // Рассрочка от застройщика
        'has_mortgage', // Ипотека от застройщика
        'has_balcony', // есть ли балкон
        'has_loggia', // есть ли лоджия
    ];

    protected $casts = [
        'area_living' => 'decimal:2',
        'area_kitchen' => 'decimal:2',
        'floor' => 'integer',
        'floors_total' => 'integer',
        'rooms_total' => 'integer',
        'bathrooms_total' => 'integer',
        'completion_date' => 'date', //
        'building_floors' => 'integer', //
        'apartments_total' => 'integer', //
        'has_installment' => 'boolean', //
        'has_mortgage' => 'boolean', //
    ];

    /**
     * Объект недвижимости (новостройка)
     */
    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

    /**
     * Accessors & Mutators
     */

    /**
     * Форматированная жилая площадь
     */
    protected function areaLivingFormatted(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->area_living ? number_format($this->area_living, 1, ',', ' ') . ' м²' : null,
        );
    }

    protected function areaKitchenFormatted(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->area_kitchen ? number_format($this->area_kitchen, 1, ',', ' ') . ' м²' : null,
        );
    }

    /**
     * Форматированная площадь кухни
     */
    public function getAreaKitchenFormattedAttribute(): ?string
    {
        return $this->area_kitchen ? number_format($this->area_kitchen, 1, ',', ' ') . ' м²' : null;
    }

    /**
     * Форматированный этаж (с учетом общего количества этажей)
     */
    protected function floorFormatted(): Attribute
    {
        return Attribute::make(
            get: function () {
                if (!$this->floor) return null;

                if ($this->floors_total) {
                    return "{$this->floor} из {$this->floors_total}";
                }

                return (string) $this->floor;
            },
        );
    }

    /**
     * Форматированное количество комнат
     */
    protected function roomsFormatted(): Attribute
    {
        return Attribute::make(
            get: function () {
                if (!$this->rooms_total) return null;

                $rooms = (int) $this->rooms_total;

                if ($rooms === 1) return '1 комната';
                if ($rooms >= 2 && $rooms <= 4) return "{$rooms} комнаты";

                return "{$rooms} комнат";
            },
        );
    }

    /**
     * Количество санузлов с правильным склонением
     */
    public function getBathroomsFormattedAttribute(): ?string
    {
        if (!$this->bathrooms_total) return null;

        $count = (int) $this->bathrooms_total;
        $forms = ['санузел', 'санузла', 'санузлов'];

        $cases = [2, 0, 1, 1, 1, 2];
        $form = $forms[($count % 100 > 4 && $count % 100 < 20) ? 2 : $cases[min($count % 10, 5)]];

        return "{$count} {$form}";
    }

    /**
     * Планировка (студия, 1-комнатная и т.д.)
     */
    public function getLayoutTypeAttribute(): string
    {
        if (!$this->rooms_total) return 'не указано';

        return match($this->rooms_total) {
            0 => 'Свободная планировка',
            1 => '1-комнатная',
            2 => '2-комнатная',
            3 => '3-комнатная',
            4 => '4-комнатная',
            5 => '5-комнатная',
            default => "{$this->rooms_total}-комнатная"
        };
    }

    /**
     * Наличие балкона/лоджии текстом
     */
    public function getBalconyInfoAttribute(): string
    {
        $parts = [];

        if ($this->has_balcony) $parts[] = 'балкон';
        if ($this->has_loggia) $parts[] = 'лоджия';

        return $parts ? implode(', ', $parts) : 'нет';
    }

    /**
     * Высота потолков с единицами измерения
     */
    public function getCeilingHeightFormattedAttribute(): ?string
    {
        return $this->ceiling_height ? number_format($this->ceiling_height, 2, ',', ' ') . ' м' : null;
    }
}
