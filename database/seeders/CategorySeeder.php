<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Tips Orang Tua', 'slug' => 'tips-orang-tua'],
            ['name' => 'Eksperimen Seru', 'slug' => 'eksperimen-seru'],
            ['name' => 'Kisah Inspiratif', 'slug' => 'kisah-inspiratif'],
            ['name' => 'Info Program', 'slug' => 'info-program'],
        ];

        foreach ($categories as $cat) {
            Category::firstOrCreate(['slug' => $cat['slug']], $cat);
        }
    }
}
