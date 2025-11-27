<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Таблица характеристик коммерческой недвижимости
     */
    public function up(): void
    {
        Schema::create('commercial_features', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained()->onDelete('cascade');

            $table->unsignedBigInteger('commercial_type_id')->nullable()->default(null); // Тип: 'офис', 'магазин', 'склад', 'ресторан'
            $table->unsignedBigInteger('purpose_id')->nullable()->default(null); // Назначение: 'розничная торговля', 'офисы', 'производство'
            $table->boolean('has_ventilation')->nullable(); // Вентиляция
            $table->boolean('has_air_conditioning')->nullable(); // Кондиционирование
            $table->boolean('has_security')->nullable(); // Охрана
            $table->boolean('has_parking')->nullable(); // Парковка
            $table->integer('parking_spaces')->nullable(); // Количество парковочных мест
            $table->unsignedBigInteger('layout_type_id')->nullable(); // Планировка: 'open space', 'кабинеты'
            $table->timestamps();

            $table->foreign('commercial_type_id')
                ->references('id')
                ->on('commercial_types')
                ->onDelete('set null');

            $table->foreign('purpose_id')
                ->references('id')
                ->on('purposes')
                ->onDelete('set null');

            $table->foreign('layout_type_id')
                ->references('id')
                ->on('layout_types')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commercial_features');
    }
};
