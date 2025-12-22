<?php

namespace App\Models;

use App\Services\ImageUploadService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Builder;

class Property extends Model
{
    protected $fillable = [
        'title',
        'description',
        'price',
        'property_type_id',
        'category_id',
        'user_id', // Владелец/риелтор
        'is_published',
        'views_count'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_published' => 'boolean',
        'views_count' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime'
    ];

    protected $appends = [
        'formatted_price',
        'main_image_url'
    ];

    /**
     * Тип недвижимости (Новостройка, Квартира, Дом и т.д.)
     */
    public function propertyType(): BelongsTo
    {
        return $this->belongsTo(PropertyType::class);
    }

    /**
     * Тип сделки (Продажа, Аренда)
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Владелец/риелтор, который добавил объект
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Общие характеристики (площадь, комнаты, этажи и т.д.)
     */
    public function features(): HasOne
    {
        return $this->hasOne(PropertyFeature::class);
    }

    /**
     * Адрес объекта
     */
    public function address(): HasOne
    {
        return $this->hasOne(Address::class);
    }

    /**
     * Характеристики новостроек (если применимо)
     */
    public function newBuildingFeatures(): HasOne
    {
        return $this->hasOne(NewBuildingFeature::class);
    }

    /**
     * Характеристики коммерческой недвижимости (если применимо)
     */
    public function commercialFeatures(): HasOne
    {
        return $this->hasOne(CommercialFeature::class);
    }

    /**
     * Характеристики гаражей (если применимо)
     */
    public function garageFeatures(): HasOne
    {
        return $this->hasOne(GarageFeature::class);
    }

    /**
     * Характеристики земельных участков (если применимо)
     */
    public function landFeatures(): HasOne
    {
        return $this->hasOne(LandFeature::class);
    }

    /**
     * Изображения объекта
     */
    public function media(): HasMany
    {
        return $this->hasMany(Media::class)->orderBy('order');
    }

    public function getImagesDir()
    {
        return 'property/' . $this->id . '/images/';
    }

    /**
     * Accessors & Mutators
     */

    /**
     * Форматированная цена с разделителями тысяч
     */
    public function getFormattedPriceAttribute(): string
    {
        return number_format($this->price, 0, ',', ' ') . ' ₽';
    }

    /**
     * Цена за квадратный метр
     */
    public function getPricePerSquareMeterAttribute(): ?string
    {
        if (!$this->features || !$this->features->area_total) {
            return null;
        }

        $pricePerM2 = $this->price / $this->features->area_total;
        return number_format($pricePerM2, 0, ',', ' ') . ' ₽/м²';
    }

    /**
     * Главное изображение
     */
    public function getMainImageUrlAttribute(): ?string
    {
        $mainImage = $this->media->where('is_main', true)->first();

        if (!$mainImage) {
            $mainImage = $this->media->first();
        }

        return $mainImage ? asset('storage/' . $mainImage->file_path . $mainImage->file_name) : 'https://imgholder.ru/400x250/8493a8/adb9ca&text=IMAGE+HOLDER&font=kelson';
    }

    public function getMainImageUrlMiniAttribute(): ?string
    {
        $mainImage = $this->media->where('is_main', true)->first();

        if (!$mainImage) {
            $mainImage = $this->media->first();
        }

        return $mainImage ? asset('storage/' . $mainImage->file_path . ImageUploadService::PREFIX_MINI . $mainImage->file_name) : 'https://imgholder.ru/400x250/8493a8/adb9ca&text=IMAGE+HOLDER&font=kelson';
    }

    public function getImageUrlAllAttribute()
    {
        if(!$this->media){
            return null;
        }

        return $this->media->map(function ($item) {
            return (object)[
                'id' => $item->id,
                'path' => asset('storage/' . $item->file_path . $item->file_name),
                'is_main' => $item->is_main,
                'order' => $item->order,
            ];
        });
    }

    public function getImageUrlAllMiniAttribute()
    {
        if(!$this->media){
            return null;
        }

        return $this->media->map(function ($item) {
            return (object)[
                'id' => $item->id,
                'path' => asset('storage/' . $item->file_path . ImageUploadService::PREFIX_MINI . $item->file_name),
                'is_main' => $item->is_main,
                'order' => $item->order,
            ];
        });
    }

    public function getImageUrlAttribute()
    {
        if(!$this->media){
            return null;
        }

        return $this->media->filter(function ($item) {
            return !$item->is_main;
        })->map(function ($item) {
            return [
                'id' => $item->id,
                'path' => asset('storage/' . $item->file_path . $item->file_name),
                'is_main' => $item->is_main,
                'order' => $item->order,
            ];
        });
    }

    public function getImageUrlMiniAttribute()
    {
        if(!$this->media){
            return null;
        }

        return $this->media->filter(function ($item) {
            return !$item->is_main;
        })->map(function ($item) {
            return [
                'id' => $item->id,
                'path' => asset('storage/' . $item->file_path . ImageUploadService::PREFIX_MINI . $item->file_name),
                'is_main' => $item->is_main,
                'order' => $item->order,
            ];
        });
    }

    /**
     * Полный адрес строкой
     */
    public function getFullAddressAttribute(): string
    {
        if (!$this->address) {
            return 'Адрес не указан';
        }

        $address = $this->address;
        $parts = [
            $address->city,
            $address->district,
            $address->street,
            $address->house_number,
            $address->apartment_number ? 'кв. ' . $address->apartment_number : null
        ];

        return implode(', ', array_filter($parts));
    }

    /**
     * Получить slug типа недвижимости
     */
    public function getPropertyTypeSlugAttribute(): ?string
    {
        return $this->propertyType?->slug;
    }

    /**
     * Получить все специфичные характеристики для данного типа недвижимости
     */
    public function getSubDataAttribute()
    {
        $subData = null;

        switch ($this->property_type_slug) {
            case 'novostroiki':
            case 'kvartiry':
            case 'komnaty':
                $subData = $this->newBuildingFeatures;
                break;
            case 'doma':
                $subData = $this->houseFeatures;
                break;
            case 'uchastki':
                $subData = $this->landFeatures;
                break;
            case 'kommerceskaia-nedvizimost':
                $subData = $this->commercialFeatures;
                break;
            case 'garazi':
                $subData = $this->garageFeatures;
                break;
        }

        return $subData;
    }


    /**
     * Methods
     */

    /**
     * Проверить, находится ли объект в указанном радиусе
     */
    public function isInRadius(float $lat, float $lng, float $radiusKm): bool
    {
        if (!$this->geospatialData) {
            return false;
        }

        // Используем Haversine formula для расчета расстояния
        $distance = $this->geospatialData->getDistance($lat, $lng);

        return $distance <= $radiusKm;
    }


    /**
     * Получить похожие объекты
     */
    public function getSimilarProperties(int $limit = 6): Builder
    {
        return self::published()
            ->where('id', '!=', $this->id)
            ->where('property_type_id', $this->property_type_id)
            ->where('transaction_type_id', $this->transaction_type_id)
            ->whereBetween('price', [$this->price * 0.7, $this->price * 1.3])
            ->with(['features', 'address', 'media'])
            ->orderBy('created_at', 'desc')
            ->limit($limit);
    }


}
