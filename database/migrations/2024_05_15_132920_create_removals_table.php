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
        Schema::create('removals', function (Blueprint $table) {
            $table->id();
            $table->boolean('stock')->comment('1 main stock, 0 dead stock')->nullable();
            $table->unsignedBigInteger('item_no')->nullable();
            $table->foreign('item_no')->references('id')->on('product_items')->onDelete('cascade');
            $table->unsignedBigInteger('serial_no')->nullable();
            $table->foreign('serial_no')->references('id')->on('product_items')->onDelete('cascade');
            $table->string('reason')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('removals');
    }
};
