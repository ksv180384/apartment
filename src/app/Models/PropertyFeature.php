<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// Общие характеристики
class PropertyFeature extends Model
{
    protected $fillable = [
        'property_id',
        'area_total', // Общая площадь в м²
        'year_built', // Год постройки
    ];

    protected $casts = [
        'year_built' => 'integer',
    ];

    protected $appends = [
        'area_total_formatted',
    ];

    /**
     * Объект недвижимости, к которому относятся характеристики
     */
    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

    public function condition(): BelongsTo
    {
        return $this->belongsTo(Condition::class);
    }

    /**
     * Accessors & Mutators
     */

    /**
     * Форматированная общая площадь
     */
    protected function areaTotalFormatted(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->area_total ? number_format($this->area_total, 1, ',', ' ') . ' м²' : null,
        );
    }
}
