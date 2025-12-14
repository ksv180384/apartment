<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('house_features', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained()->onDelete('cascade');

            // ОСНОВНЫЕ ХАРАКТЕРИСТИКИ
            $table->decimal('land_area', 10, 2)->nullable(); // Площадь участка в сотках
            $table->integer('building_floors')->nullable(); // Этажность дома
            $table->integer('bedrooms_total')->nullable(); // Количество спален
            $table->string('wall_material')->nullable(); // Материал стен
            $table->string('roof_material')->nullable(); // Материал крыши
            $table->unsignedBigInteger('finishing_type_id')->nullable()->default(null);
            $table->decimal('area_living', 10, 2)->nullable()->after('floor'); // Жилая площадь в м²
            $table->integer('bathrooms_total')->nullable()->after('rooms_total'); // Количество санузлов
            $table->decimal('ceiling_height', 5, 2)->nullable()->after('bathrooms_total'); // Высота потолков

            // КОММУНИКАЦИИ
            $table->boolean('has_electricity')->nullable(); // Электричество
            $table->boolean('has_water_supply')->nullable(); // Водоснабжение
            $table->boolean('has_sewage')->nullable(); // Канализация
            $table->boolean('has_heating')->nullable(); // Отопление
            $table->boolean('has_gas')->nullable(); // Газ
            $table->boolean('has_internet')->nullable(); // Интернет
            $table->boolean('has_phone_line')->nullable(); // Телефонная линия

            // ОСНАЩЕНИЕ И ОСОБЕННОСТИ
            $table->boolean('has_garage')->nullable(); // Гараж
            $table->boolean('has_basement')->nullable(); // Подвал
            $table->boolean('has_attic')->nullable(); // Чердак/мансарда
            $table->boolean('has_balcony')->nullable(); // Балкон
            $table->boolean('has_terrace')->nullable(); // Терраса
            $table->boolean('has_veranda')->nullable(); // Веранда
            $table->boolean('has_pool')->nullable(); // Бассейн
            $table->boolean('has_sauna')->nullable(); // Сауна/баня
            $table->boolean('has_fireplace')->nullable(); // Камин

            // ТЕРРИТОРИЯ И БЛАГОУСТРОЙСТВО
            $table->boolean('has_fence')->nullable(); // Ограждение
            $table->boolean('has_garden')->nullable(); // Сад
            $table->boolean('has_vegetable_garden')->nullable(); // Огород
            $table->boolean('has_lawn')->nullable(); // Газон
            $table->boolean('has_playground')->nullable(); // Детская площадка
            $table->boolean('has_parking')->nullable(); // Парковка

            // ДОПОЛНИТЕЛЬНЫЕ ХАРАКТЕРИСТИКИ
            $table->string('foundation_type')->nullable(); // Тип фундамента
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('house_features');
    }
};
