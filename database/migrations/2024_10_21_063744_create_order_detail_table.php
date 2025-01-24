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
        Schema::create('order_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('barangjual_id');
            $table->foreignId('order_id')->nullable()->constrained('orders', 'id')->onDelete('cascade');
            $table->integer('quantity');
            $table->integer('price');
            $table->integer('status')->default(1)->comment('0: reject,1: default, 2: accept');
            $table->foreign('barangjual_id')->references('id')->on('barang_juals');
            $table->timestamps();
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_detail');
    }
};
