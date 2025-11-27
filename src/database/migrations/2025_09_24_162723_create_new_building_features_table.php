<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Таблица характеристик новостроек
     */
    public function up(): void
    {
        Schema::create('new_building_features', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained()->onDelete('cascade');
            $table->date('completion_date')->nullable(); // Дата сдачи дома
            $table->string('building_name')->nullable(); // Название ЖК
            $table->string('developer')->nullable(); // Застройщик
            $table->unsignedBigInteger('building_class_id')->nullable()->default(null); // Класс жилья: 'эконом', 'комфорт', 'бизнес', 'элит'
            $table->unsignedBigInteger('building_type_id')->nullable();  // Тип дома: 'Монолитный', 'Панельный', 'Кирпичный', 'Блочный', ...
            $table->integer('building_floors')->nullable(); // Этажность дома
            $table->integer('apartments_total')->nullable(); // Количество квартир в доме
            $table->unsignedBigInteger('finishing_type_id')->nullable()->default(null); // Тип отделки: 'без отделки', 'чистовая', 'под ключ'
            $table->boolean('has_installment')->nullable(); // Рассрочка от застройщика
            $table->boolean('has_mortgage')->nullable(); // Ипотека от застройщика
            $table->boolean('has_balcony')->nullable(); // есть ли балкон
            $table->boolean('has_loggia')->nullable(); // есть ли лоджия
            $table->timestamps();

            $table->foreign('building_class_id')
                ->references('id')
                ->on('building_classes')
                ->onDelete('set null');

            $table->foreign('building_type_id')
                ->references('id')
                ->on('building_types')
                ->onDelete('set null');

            $table->foreign('finishing_type_id')
                ->references('id')
                ->on('finishing_types')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('new_building_features');
    }
};
