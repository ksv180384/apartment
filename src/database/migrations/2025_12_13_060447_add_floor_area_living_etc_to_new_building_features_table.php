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
        Schema::table('new_building_features', function (Blueprint $table) {
            $table->integer('floor')->nullable()->after('building_floors'); // Этаж
            $table->decimal('area_living', 10, 2)->nullable()->after('floor'); // Жилая площадь в м²
            $table->decimal('area_kitchen', 5, 2)->nullable()->after('area_living'); // Площадь кухни в м²
            $table->integer('rooms_total')->nullable()->after('area_kitchen'); // Количество комнат
            $table->integer('bathrooms_total')->nullable()->after('rooms_total'); // Количество санузлов
            $table->decimal('ceiling_height', 5, 2)->nullable()->after('bathrooms_total'); // Высота потолков
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('new_building_features', function (Blueprint $table) {
            $table->dropColumn([
                'floor',
                'area_living',
                'rooms_total',
                'bathrooms_total',
                'ceiling_height'
            ]);
        });
    }
};
