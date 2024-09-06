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
        Schema::create('edibleoils', function (Blueprint $table) {
            $table->id();
            $table->longText('year_establishment');
            $table->longText('plant_manufacturer');
            $table->longText('country_origin');
            $table->longText('existing_capacity');
            $table->longText('product');
            $table->longText('utility_requirement');
            $table->longText('manpower_requirement');
            $table->string('images');
            $table->string('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('edibleoils');
    }
};
