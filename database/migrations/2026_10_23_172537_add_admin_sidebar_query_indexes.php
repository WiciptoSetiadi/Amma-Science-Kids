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
        Schema::table('orders', function (Blueprint $table) {
            $table->index('status', 'orders_status_index');
        });

        Schema::table('contact_messages', function (Blueprint $table) {
            $table->index('is_read', 'contact_messages_is_read_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropIndex('orders_status_index');
        });

        Schema::table('contact_messages', function (Blueprint $table) {
            $table->dropIndex('contact_messages_is_read_index');
        });
    }
};
