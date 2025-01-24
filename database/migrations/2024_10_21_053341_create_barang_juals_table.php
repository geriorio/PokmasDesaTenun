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
        Schema::create('barang_juals', function (Blueprint $table) {
            $table->id(); 
            $table->string('image')->nullable();
            $table->string('name')->nullable();
            $table->integer('price');
            $table->integer('stock');
            $table->integer('tipe')->comment('1: katalog 2: custom');
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_juals');
    }
};
