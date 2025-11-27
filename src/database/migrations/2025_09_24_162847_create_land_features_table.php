<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Таблица характеристик земельных участков
     * php
     * */
    public function up(): void
    {
        Schema::create('land_features', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained()->onDelete('cascade');
            $table->decimal('land_area', 10, 2)->nullable(); // Площадь участка
            $table->string('land_category')->nullable(); // Категория земли: 'ИЖС', 'СНТ', 'ЛПХ', 'коммерческая'
            $table->string('permitted_use')->nullable(); // Разрешенное использование
            $table->boolean('has_utilities')->nullable(); // Коммуникации
            $table->string('relief')->nullable(); // Рельеф: 'ровный', 'холмистый'
            $table->string('soil_type')->nullable(); // Тип почвы
            $table->boolean('has_road_access')->nullable(); // Подъездные пути
            $table->boolean('has_fence')->nullable(); // Ограждение

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('land_features');
    }
};
