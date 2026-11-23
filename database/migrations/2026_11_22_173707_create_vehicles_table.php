<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('brand');
            $table->string('type'); // Car, Van, Bike
            $table->decimal('price_per_day', 10, 2);
            $table->integer('seats')->default(4);
            $table->string('transmission')->default('Auto'); // Auto / Manual
            $table->string('fuel')->default('Petrol');
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->string('status')->default('available'); // available / rented
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};