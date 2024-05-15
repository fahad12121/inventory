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
            $table->unsignedBigInteger('employee_id')->nullable()->after('branch_issued_at');
            $table->foreign('employee_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('is_employee_issued')->default(0)->comment('1 if issued_employee, 0 if not_issued')->after('employee_id');
            $table->timestamp('employee_issued_at')->after('is_employee_issued')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_items', function (Blueprint $table) {
            // 1. Drop foreign key constraints
            $table->dropForeign(['employee_id']);

            // 2. Drop the column
            $table->dropColumn('employee_id');

            $table->dropColumn('is_employee_issued');
            
            $table->dropColumn('employee_issued_at');
        });
    }
};
