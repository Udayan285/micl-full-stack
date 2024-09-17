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
            $table->longText('plant_manufacturer');
            $table->longText('country_origin');
            $table->longText('prime_raw_material');
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
