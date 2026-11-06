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
         if (! Schema::hasColumn('users', 'google_id')) {
             Schema::table('users', function (Blueprint $table) {
                 $table->string('google_id')->nullable()->unique()->after('whatsapp_number');
             });
         }

         if (! Schema::hasColumn('users', 'avatar')) {
             Schema::table('users', function (Blueprint $table) {
                 $table->string('avatar')->nullable()->after('google_id');
             });
         }
     }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // This repair may not own columns that were already present before it ran.
    }
};
