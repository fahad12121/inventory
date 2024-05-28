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
            $table->string('stock_no')->nullable()->after('serial_no');
            $table->string('server')->nullable()->after('stock_no');
            $table->string('date')->nullable()->after('server');
            $table->string('status')->nullable()->after('server');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_items', function (Blueprint $table) {
            $table->dropColumn('stock_no');
            $table->dropColumn('server');
            $table->dropColumn('date');
            $table->dropColumn('status');
        });
    }
};
