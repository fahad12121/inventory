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
        Schema::table('product_items', function (Blueprint $table) {
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('is_customer_issued')->default(0)->comment('1 if is_customer_issued, 0 if not_issued');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_items', function (Blueprint $table) {
             // 1. Drop foreign key constraints
             $table->dropForeign(['customer_id']);

             // 2. Drop the column
             $table->dropColumn('customer_id');

             $table->dropColumn('is_customer_issued');
        });
    }
};
