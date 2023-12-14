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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('city_name');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('title');
            $table->string('small_image');
            $table->string('large_image');
            $table->string('short_description',300);
            $table->longText('long_description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
