<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('homepage_contents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('featured_article_id')->nullable()->constrained('articles')->nullOnDelete();
            $table->foreignId('featured_program_one_id')->nullable()->constrained('programs')->nullOnDelete();
            $table->foreignId('featured_program_two_id')->nullable()->constrained('programs')->nullOnDelete();
            $table->boolean('is_configured')->default(false);
            $table->timestamps();
        });

        DB::table('homepage_contents')->insert([
            'id' => 1,
            'is_configured' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homepage_contents');
    }
};
