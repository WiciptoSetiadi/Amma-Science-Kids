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
        Schema::table('homepage_contents', function (Blueprint $table): void {
            $table->foreignId('featured_homepage_video_id')
                ->nullable()
                ->after('featured_program_two_id')
                ->constrained('homepage_videos')
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('homepage_contents', function (Blueprint $table): void {
            $table->dropConstrainedForeignId('featured_homepage_video_id');
        });
    }
};
