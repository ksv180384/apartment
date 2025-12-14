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
        Schema::table('house_features', function (Blueprint $table) {
            $table->after('roof_material', function (Blueprint $table) {
                $table->integer('building_floors')->nullable()->comment('Этажность дома');
                $table->unsignedBigInteger('finishing_type_id')->nullable()->default(null);
                $table->decimal('area_living', 10, 2)->nullable()->comment('Жилая площадь в м²');
                $table->integer('bathrooms_total')->nullable()->comment('Количество санузлов');
                $table->decimal('ceiling_height', 5, 2)->nullable()->comment('Высота потолков');
            });

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
        Schema::table('house_features', function (Blueprint $table) {
            //
        });
    }
};
