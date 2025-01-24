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
        Schema::create('forecast_products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('quantity');
            $table->string('unit');
            $table->integer('price');
            $table->foreignId('supplier_id')->nullable()->constrained('suppliers', 'id')->cascadeOnDelete();
            $table->timestamps();
        });

        Schema::create('forecast_purchase_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('purchase_id')->constrained('purchases')->cascadeOnDelete();
            $table->foreignId('product_id')->constrained('forecast_products');
            $table->integer('quantity');
            $table->integer('price');
            $table->timestamps();
        });

        Schema::create('forecast_expenditures', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('total_price');
            $table->date('exp_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forecasts');
    }
};
