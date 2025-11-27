<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;

// Коммерческая недвижимость
class CommercialFeature extends Model
{
    protected $fillable = [
        'property_id',
        'commercial_type_id', //Тип: 'офис', 'магазин', 'склад', 'ресторан'
        'purpose_id',// Назначение: 'розничная торговля', 'офисы', 'производство'
        'has_ventilation', // Вентиляция
        'has_air_conditioning', // Кондиционирование
        'has_security', // Охрана
        'has_parking', // Парковка
        'parking_spaces', // Количество парковочных мест
        'layout_type', // Планировка: 'open space', 'кабинеты'
//        'condition', // Состояние: 'Отличное', 'Хорошее', 'Удовлетворительное', ...
    ];

    protected $casts = [
        'has_ventilation' => 'boolean',
        'has_air_conditioning' => 'boolean',
        'has_security' => 'boolean',
        'has_parking' => 'boolean',
        'parking_spaces' => 'integer',
        'has_loading_dock' => 'boolean',
    ];

    /**
     * Объект коммерческой недвижимости
     */
    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

    /**
     * Ярлык типа коммерческой недвижимости
     */
//    protected function commercialTypeLabel(): Attribute
//    {
//        return Attribute::make(
//            get: function () {
//                return match($this->commercial_type) {
//                    'office' => 'Офисное помещение',
//                    'retail' => 'Торговое помещение',
//                    'warehouse' => 'Складское помещение',
//                    'industrial' => 'Производственное помещение',
//                    'cafe_restaurant' => 'Кафе/Ресторан',
//                    'hotel' => 'Гостиница',
//                    'medical' => 'Медицинский центр',
//                    'sports' => 'Спортивный центр',
//                    'beauty' => 'Салон красоты',
//                    'entertainment' => 'Развлекательный центр',
//                    'storage' => 'Кладовая',
//                    'commercial_land' => 'Земля коммерческого назначения',
//                    default => 'Не указано'
//                };
//            },
//        );
//    }

    /**
     * Ярлык назначения помещения
     */
//    protected function purposeLabel(): Attribute
//    {
//        return Attribute::make(
//            get: function () {
//                return match($this->purpose) {
//                    'retail_trade' => 'Розничная торговля',
//                    'wholesale_trade' => 'Оптовая торговля',
//                    'office_work' => 'Офисная работа',
//                    'production' => 'Производство',
//                    'storage' => 'Хранение',
//                    'services' => 'Услуги',
//                    'catering' => 'Общественное питание',
//                    'medical_services' => 'Медицинские услуги',
//                    'beauty_services' => 'Услуги красоты',
//                    'sports_services' => 'Спортивные услуги',
//                    'education' => 'Образование',
//                    'entertainment' => 'Развлечения',
//                    'exhibition' => 'Выставочная деятельность',
//                    default => 'Не указано'
//                };
//            },
//        );
//    }

    /**
    * Состояние помещения
    */
//    protected function conditionLabel(): Attribute
//    {
//        return Attribute::make(
//            get: function () {
//                return match($this->condition) {
//                    'excellent' => 'Отличное',
//                    'good' => 'Хорошее',
//                    'satisfactory' => 'Удовлетворительное',
//                    'needs_repair' => 'Требует ремонта',
//                    'under_construction' => 'В стадии строительства',
//                    'shell_and_core' => 'Shell and core',
//                    'category_a' => 'Категория A',
//                    'category_b' => 'Категория B',
//                    'category_c' => 'Категория C',
//                    default => 'Не указано'
//                };
//            },
//        );
//    }

    /**
     * Тип планировки
     */
//    protected function layoutTypeLabel(): Attribute
//    {
//        return Attribute::make(
//            get: function () {
//                return match($this->layout_type) {
//                    'open_space' => 'Опен-спейс',
//                    'cabinet' => 'Кабинетная',
//                    'mixed' => 'Смешанная',
//                    'free_planning' => 'Свободная планировка',
//                    'modular' => 'Модульная',
//                    'custom' => 'Индивидуальная',
//                    default => 'Не указано'
//                };
//            },
//        );
//    }

    /**
     * Наличие парковки с детализацией
     */
    public function getParkingInfoAttribute(): string
    {
        if (!$this->has_parking) return 'Парковка отсутствует';

        if ($this->parking_spaces) {
            return "Парковка на {$this->parking_spaces} " . $this->getNumEnding($this->parking_spaces, ['место', 'места', 'мест']);
        }

        return 'Парковка есть';
    }
}
