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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->boolean('active')->default(1);
            $table->integer('order')->default(1);
            $table->string('small_image');
            $table->string('large_image');
            $table->string('title');
            $table->foreignId('category_id')->nullable()->references('id')->on('course_categories')->nullOnDelete();
            $table->string('short_description',300);
            $table->json('details');
            $table->longText('long_description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
