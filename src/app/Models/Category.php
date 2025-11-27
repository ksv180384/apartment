<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }

            // Автоматическое определение order
            if (empty($category->order)) {
                $category->order = static::getNextOrder();
            }
        });

        static::updating(function ($category) {
            if ($category->isDirty('name') && empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });

        // При удалении категории перенумеровываем оставшиеся
        static::deleted(function ($category) {
            static::reorderCategories();
        });
    }

    /**
     * Получить следующий порядковый номер
     */
    protected static function getNextOrder(): int
    {
        $lastOrder = static::max('order');
        return ($lastOrder ?: 0) + 1;
    }

    /**
     * Перенумеровать все категории после удаления
     */
    protected static function reorderCategories(): void
    {
        $categories = static::orderBy('order')->get();

        foreach ($categories as $index => $category) {
            $category->order = $index + 1;
            $category->saveQuietly(); // Сохраняем без вызова событий
        }
    }


}
