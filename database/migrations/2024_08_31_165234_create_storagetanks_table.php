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
        Schema::create('storagetanks', function (Blueprint $table) {
            $table->id();
            $table->longText('year_establishment');
            $table->longText('storage_capacity');
            $table->longText('product_turnover');
            $table->longText('inward_facility');
            $table->longText('jetty_facility');
            $table->longText('pipeline_facility');
            $table->longText('delivery_facility');
            $table->longText('outward_delivey');
            $table->longText('weight_scale');
            $table->longText('utility_requirement');
            $table->longText('manpower_requirement');
            $table->longText('opportunity');
            $table->longText('bonded_facility');
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
        Schema::dropIfExists('storagetanks');
    }
};
