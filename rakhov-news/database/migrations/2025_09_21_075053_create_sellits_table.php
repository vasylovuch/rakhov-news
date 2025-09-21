<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sellits', function (Blueprint $table) {
            $table->id();
            $table->string('title');               // назва товару
            $table->text('description');           // опис
            $table->decimal('price', 10, 2);       // ціна
            $table->string('image')->nullable();   // шлях до фото
            $table->string('category');            // категорія
            $table->string('phone')->nullable();   // номер телефону
            $table->string('location')->nullable(); // місце знаходження (село/місто)
            $table->timestamps();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('sellits');
    }
};
