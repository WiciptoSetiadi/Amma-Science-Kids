<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
        ]);

        $admin = User::firstOrCreate(
            ['email' => 'admin@ammasciencekids.com'],
            [
                'name' => 'Admin Amma Science',
                'whatsapp_number' => '081234567890',
                'password' => bcrypt('admin123'),
            ]
        );
        $admin->assignRole('admin');

        $user = User::firstOrCreate(
            ['email' => 'user@example.com'],
            [
                'name' => 'Member User',
                'whatsapp_number' => '089876543210',
                'password' => bcrypt('password123'),
            ]
        );
        $user->assignRole('user');

        $this->call([
            ProgramSeeder::class,
            GallerySeeder::class,
            CategorySeeder::class,
            ArticleSeeder::class,
        ]);
    }
}
