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
        Schema::create('physicalrefineries', function (Blueprint $table) {
            $table->id();
            $table->longText('year_establishment');
            $table->longText('plant_manufacturer');
            $table->longText('country_origin');
            $table->longText('prime_raw_material');
            $table->longText('product');
            $table->longText('pack_size');
            $table->longText('existing_capacity');
            $table->longText('utility_requirement');
            $table->longText('manpower_requirement');
            $table->longText('present_status');
            $table->string('images')->nullable();
            $table->string('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('physicalrefineries');
    }
};
