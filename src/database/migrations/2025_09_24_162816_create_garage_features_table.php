<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Таблица характеристик гаражей
     */
    public function up(): void
    {
        Schema::create('garage_features', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained()->onDelete('cascade');

            // ХАРАКТЕРИСТИКИ ГАРАЖЕЙ
            $table->unsignedBigInteger('garage_type_id')->nullable()->default(null); // Тип: 'отдельный', 'в кооперативе', 'подземный'
            $table->unsignedBigInteger('ownership_type_id')->nullable()->default(null); // Форма собственности: 'собственность', 'аренда'
            $table->string('equipment', 500)->nullable(); // Оборудование
            $table->boolean('has_electricity')->nullable(); // Электричество
            $table->boolean('has_heating')->nullable(); // Отопление
            $table->boolean('has_water_supply')->nullable(); // Водоснабжение
            $table->decimal('gate_height', 5, 2)->nullable(); // Высота ворот
            $table->decimal('gate_width', 5, 2)->nullable(); // Ширина ворот
            $table->integer('vehicle_capacity')->nullable(); // Вместимость (количество машин)

            $table->timestamps();

            $table->foreign('garage_type_id')
                ->references('id')
                ->on('garage_types')
                ->onDelete('set null');

            $table->foreign('ownership_type_id')
                ->references('id')
                ->on('ownership_types')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('garage_features');
    }
};
