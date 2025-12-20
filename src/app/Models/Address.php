<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Address extends Model
{
    protected $fillable = [
        'property_id',
        'region',
        'city',
        'district',
        'street',
        'house_number',
        'apartment_number',
        'latitude',
        'longitude'
    ];
    public $timestamps = false;

    protected $casts = [
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
    ];

    protected $appends = [
        'full_address',
        'short_address',
        'city_district',
        'coordinates',
        'has_coordinates',
        'map_url'
    ];

    /**
     * Объект недвижимости, к которому привязан адрес
     */
    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

    /**
     * Полный адрес одной строкой
     */
    protected function fullAddress(): Attribute
    {
        return Attribute::make(
            get: function () {
                $parts = [
                    $this->region,
                    $this->city,
                    $this->district,
                    'ул. ' . $this->street,
                    'д. ' . $this->house_number
                ];

                if ($this->apartment_number) {
                    $parts[] = 'кв. ' . $this->apartment_number;
                }

                return implode(', ', array_filter($parts));
            },
        );
    }

    /**
     * Короткий адрес (город, улица, дом)
     */
    protected function shortAddress(): Attribute
    {
        return Attribute::make(
            get: function () {
                $parts = [
                    $this->city,
                    'ул. ' . $this->street,
                    'д. ' . $this->house_number
                ];

                if ($this->apartment_number) {
                    $parts[] = 'кв. ' . $this->apartment_number;
                }

                return implode(', ', $parts);
            },
        );
    }

    /**
     * Город и район
     */
    protected function cityDistrict(): Attribute
    {
        return Attribute::make(
            get: function () {
                $parts = [$this->city];
                if ($this->district) {
                    $parts[] = $this->district . ' р-н';
                }
                return implode(', ', $parts);
            },
        );
    }

    /**
     * Координаты в формате для карт
     */
    protected function coordinates(): Attribute
    {
        return Attribute::make(
            get: function () {
                if (!$this->latitude || !$this->longitude) {
                    return null;
                }
                return [
                    'lat' => (float) $this->latitude,
                    'lng' => (float) $this->longitude
                ];
            },
        );
    }

    /**
     * Проверка наличия координат
     */
    protected function hasCoordinates(): Attribute
    {
        return Attribute::make(
            get: fn () => !is_null($this->latitude) && !is_null($this->longitude),
        );
    }

    /**
     * Ссылка на карты
     */
    protected function mapUrl(): Attribute
    {
        return Attribute::make(
            get: function () {
                if (!$this->has_coordinates) {
                    return null;
                }

                // Яндекс.Карты
                $yandexUrl = "https://yandex.ru/maps/?pt={$this->longitude},{$this->latitude}&z=16&l=map";

                // Google Maps
                $googleUrl = "https://www.google.com/maps/search/?api=1&query={$this->latitude},{$this->longitude}";

                return [
                    'yandex' => $yandexUrl,
                    'google' => $googleUrl
                ];
            },
        );
    }

    /**
     * Адреса в радиусе от точки (примитивная реализация)
     */
    public function scopeInRadius($query, float $lat, float $lng, float $radiusKm)
    {
        // Простая реализация для небольших расстояний
        // Для больших проектов лучше использовать spatial indexes
        return $query->withCoordinates()
            ->whereRaw("
                        (6371 * acos(cos(radians(?)) * cos(radians(latitude)) *
                        cos(radians(longitude) - radians(?)) + sin(radians(?)) *
                        sin(radians(latitude)))) <= ?
                    ", [$lat, $lng, $lat, $radiusKm]);
    }
}
