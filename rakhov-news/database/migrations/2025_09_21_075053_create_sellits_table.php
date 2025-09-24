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
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->string('title');               
            $table->text('description');          
            $table->decimal('price', 10, 2);       
            $table->string('image')->nullable();   
            $table->string('category');            
            $table->string('phone')->nullable();   
            $table->string('location')->nullable(); 
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sellits');
    }

};
