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
        Schema::create('property_types', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')
                ->nullable()
                ->default(null)
                ->constrained('categories')
                ->nullOnDelete(); // Внешний ключ с установкой NULL при удалении
            $table->string('name'); // Название категории
            $table->string('slug')->unique(); // ЧПУ-ссылка
            $table->text('description')->nullable(); // Описание категории
            $table->integer('order')->default(0); // Порядок сортировки
            $table->boolean('is_active')->default(true); // Активна ли категория
            $table->string('meta_title')->nullable(); // Мета-заголовок для SEO
            $table->text('meta_description')->nullable(); // Мета-описание для SEO
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
