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
            $table->unsignedBigInteger('branch_id')->nullable()->after('serial_no');
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            $table->unsignedBigInteger('sender_id')->nullable()->after('branch_id');
            $table->foreign('sender_id')->references('id')->on('sed_recs')->onDelete('cascade');
            $table->unsignedBigInteger('receiver_id')->nullable()->after('sender_id');
            $table->foreign('receiver_id')->references('id')->on('sed_recs')->onDelete('cascade');
            $table->boolean('is_branch_issued')->default(0)->comment('1 if issued_branch, 0 if not_issued')->after('receiver_id');
            $table->timestamp('branch_issued_at')->after('is_branch_issued')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_items', function (Blueprint $table) {
            // 1. Drop foreign key constraints
            $table->dropForeign(['branch_id']);

            // 2. Drop the column
            $table->dropColumn('branch_id');
            // 1. Drop foreign key constraints
            $table->dropForeign(['sender_id']);

            // 2. Drop the column
            $table->dropColumn('sender_id');
            // 1. Drop foreign key constraints
            $table->dropForeign(['receiver_id']);

            // 2. Drop the column
            $table->dropColumn('receiver_id');

            $table->dropColumn('is_branch_issued');
            $table->dropColumn('branch_issued_at');
        });
    }
};
