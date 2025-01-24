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
        //

        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->unsignedBigInteger('category')->nullable();
            $table->integer('quantity');
            $table->string('unit');
            $table->integer('price');
            $table->foreignId('supplier_id')->nullable()->constrained('suppliers', 'id')->nullOnDelete();
            $table->foreign('category')->references('id')->on('kategoris')->onDelete('set null');
            $table->timestamps();
        });
    }

    /** 
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('products');
    }
};