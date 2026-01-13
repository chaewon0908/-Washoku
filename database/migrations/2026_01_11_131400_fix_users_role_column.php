<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Change role column to VARCHAR(50) to allow 'customer', 'admin', 'order_processor'
        DB::statement('ALTER TABLE `users` MODIFY COLUMN `role` VARCHAR(50) DEFAULT "customer"');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert to original if needed
        DB::statement('ALTER TABLE `users` MODIFY COLUMN `role` VARCHAR(255) DEFAULT "customer"');
    }
};
