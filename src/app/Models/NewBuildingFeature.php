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
        'completion_date', // Дата сдачи дома
        'building_name',// Название ЖК
        'developer', // Застройщик
        'building_class_id', // Класс жилья: 'эконом', 'комфорт', 'бизнес', 'элит'
        'building_type_id', // Тип дома: 'Монолитный', 'Панельный', 'Кирпичный', 'Блочный', ...
        'building_floors', // Этажность дома
        'apartments_total', // Количество квартир в доме
        'finishing_type_id', // Тип отделки: 'без отделки', 'чистовая', 'под ключ'
        'has_installment', // Рассрочка от застройщика
        'has_mortgage', // Ипотека от застройщика
        'has_balcony', // есть ли балкон
        'has_loggia', // есть ли лоджия
    ];

    protected $casts = [
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
     * Класс жилья
     */
//    protected function buildingClassLabel(): Attribute
//    {
//        return Attribute::make(
//            get: function () {
//                return match($this->building_class) {
//                    'economy' => 'Эконом-класс',
//                    'comfort' => 'Комфорт-класс',
//                    'business' => 'Бизнес-класс',
//                    'premium' => 'Премиум-класс',
//                    'elite' => 'Элитный',
//                    default => 'Не указан'
//                };
//            },
//        );
//    }

    /**
     * Тип дома
     */
//    protected function buildingTypeLabel(): Attribute
//    {
//        return Attribute::make(
//            get: function () {
//                return match($this->building_type) {
//                    'monolithic' => 'Монолитный',
//                    'panel' => 'Панельный',
//                    'brick' => 'Кирпичный',
//                    'block' => 'Блочный',
//                    'monolithic_brick' => 'Монолитно-кирпичный',
//                    'framed' => 'Каркасный',
//                    'low_rise' => 'Малоэтажный',
//                    'townhouse' => 'Таунхаус',
//                    'cottage' => 'Коттеджный поселок',
//                    default => 'Не указан'
//                };
//            },
//        );
//    }

    /**
     * Тип отделки
     */
//    protected function finishingTypeLabel(): Attribute
//    {
//        return Attribute::make(
//            get: function () {
//                return match($this->finishing_type) {
//                    'without' => 'Без отделки',
//                    'draft' => 'Черновая отделка',
//                    'clean' => 'Чистовая отделка',
//                    'euro' => 'Евроотделка',
//                    'full' => 'Полная отделка',
//                    'designer' => 'Дизайнерский ремонт',
//                    'option' => 'Опциональная отделка',
//                    default => 'Не указано'
//                };
//            },
//        );
//    }
}
