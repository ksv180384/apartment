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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained()->onDelete('cascade');
            $table->string('region'); // область, край
            $table->string('city'); // Город
            $table->string('district')->nullable(); // район города
            $table->string('street'); // Улица
            $table->string('house_number'); // Номер дома
            $table->string('apartment_number')->nullable(); // Номер квартиры
            $table->decimal('latitude', 10, 8)->nullable(); // широта
            $table->decimal('longitude', 11, 8)->nullable(); // долгота
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
