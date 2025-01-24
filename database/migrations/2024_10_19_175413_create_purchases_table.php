<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('order_date');
            $table->date('shipped_date');
            $table->integer('status')->default(0)->comment('0: pending, 1: sampai');
            $table->foreignId('supplier_id')->nullable()->constrained('suppliers', 'id')->cascadeOnDelete();
            $table->timestamps();
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
