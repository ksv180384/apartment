<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Media extends Model
{
    protected $fillable = [
        'is_main',
        'property_id',
        'file_path',
        'file_name',
        'type',
        'order',
    ];

    protected $casts = [
        'is_main' => 'boolean',
        'order' => 'integer',
    ];

    /**
     * Объект недвижимости, к которому относятся характеристики
     */
    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }
}
