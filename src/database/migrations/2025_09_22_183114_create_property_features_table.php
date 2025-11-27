<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Основная таблица характеристик (общие поля)
     */
    public function up(): void
    {
        Schema::create('property_features', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained()->onDelete('cascade');

            // ОБЩИЕ ХАРАКТЕРИСТИКИ (для всех типов недвижимости)
            $table->decimal('area_total', 8, 2)->nullable(); // Общая площадь в м²
            $table->decimal('area_living', 8, 2)->nullable(); // Жилая площадь в м²
            $table->integer('floor')->nullable(); // Этаж
            $table->integer('floors_total')->nullable(); // Всего этажей в здании
            $table->integer('rooms_total')->nullable(); // Количество комнат
            $table->integer('bathrooms_total')->nullable(); // Количество санузлов
            $table->integer('year_built')->nullable(); // Год постройки
            $table->unsignedBigInteger('condition_id')->nullable()->default(null); // Состояние: 'черновая', 'чистовая', 'требует ремонта'
            $table->unsignedBigInteger('repair_type_id')->nullable()->default(null); // Типа ремонта: Косметический, Капитальный, Евроремонт, Дизайнерский
            $table->decimal('ceiling_height', 8, 2)->nullable(); // Высота потолков
//            $table->boolean('has_balcony')->nullable(); // есть ли балкон
//            $table->boolean('has_loggia')->nullable(); // есть ли лоджия

            $table->timestamps();

            $table->foreign('condition_id')
                ->references('id')
                ->on('conditions')
                ->onDelete('set null'); // или 'cascade', в зависимости от логики

            $table->foreign('repair_type_id')
                ->references('id')
                ->on('repair_types')
                ->onDelete('set null'); // или 'cascade', в зависимости от логики
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_features');
    }
};
