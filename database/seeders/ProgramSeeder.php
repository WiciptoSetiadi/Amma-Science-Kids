<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $programs = [
            [
                'title' => 'Roadshow Sekolah',
                'slug' => 'roadshow-sekolah',
                'category' => 'Program Anak',
                'target_age' => 'TK/RA, SD/MI',
                'price' => 75000,
                'image' => null,
                'description' => 'Menghadirkan pembelajaran interaktif langsung di lingkungan sekolah melalui eksperimen nyata, demonstrasi sains spektakuler, dan petualangan eksploratif.',
                'is_active' => true,
            ],
            [
                'title' => 'Science Festival',
                'slug' => 'science-festival',
                'category' => 'Event Festival',
                'target_age' => 'TK/RA, SD/MI',
                'price' => 125000,
                'image' => null,
                'description' => 'Festival edukasi meriah yang menggabungkan berbagai zona permainan, tantangan sains, dan pertunjukan panggung sains yang memukau anak-anak dan keluarga.',
                'is_active' => true,
            ],
            [
                'title' => 'Family Learning Experience',
                'slug' => 'family-learning-experience',
                'category' => 'Family Learning',
                'target_age' => 'TK/RA, SD/MI',
                'price' => 150000,
                'image' => null,
                'description' => 'Program yang mengajak orang tua dan anak belajar bersama melalui eksplorasi proyek keluarga, membangun bonding berkualitas lewat eksperimen sains.',
                'is_active' => true,
            ],
            [
                'title' => 'Eksplorasi Sains TK/RA',
                'slug' => 'eksplorasi-sains-tk-ra',
                'category' => 'Program Anak',
                'target_age' => 'TK/RA',
                'price' => 60000,
                'image' => null,
                'description' => 'Eksperimen sensorik dan permainan sains visual sederhana yang dirancang khusus untuk memicu rasa ingin tahu balita dan anak usia dini.',
                'is_active' => true,
            ],
            [
                'title' => 'Young Scientist Lab SD/MI',
                'slug' => 'young-scientist-lab-sd-mi',
                'category' => 'Program Anak',
                'target_age' => 'SD/MI',
                'price' => 85000,
                'image' => null,
                'description' => 'Praktikum laboratorium mini untuk siswa SD/MI, mempelajari konsep fisika, kimia aman, dan biologi melalui metode ilmiah yang menyenangkan.',
                'is_active' => true,
            ],
            [
                'title' => 'Workshop Guru & Ortu: Sains Kreatif',
                'slug' => 'workshop-guru-dan-ortu-sains-kreatif',
                'category' => 'Workshop Guru & Ortu',
                'target_age' => 'Homeschooling / PKBM',
                'price' => 120000,
                'image' => null,
                'description' => 'Pelatihan praktis bagi para pendidik dan orang tua tentang cara menyusun kurikulum eksperimen sains dengan bahan-bahan ramah lingkungan di rumah.',
                'is_active' => true,
            ],
            [
                'title' => 'Sains Mandiri Homeschooling',
                'slug' => 'sains-mandiri-homeschooling',
                'category' => 'Family Learning',
                'target_age' => 'Homeschooling / PKBM',
                'price' => 95000,
                'image' => null,
                'description' => 'Modul dan pendampingan sains berbasis inquiry khusus untuk komunitas homeschooling dan pusat kegiatan belajar masyarakat (PKBM).',
                'is_active' => true,
            ],
            [
                'title' => 'Kompetisi Sains Cilik AMMA',
                'slug' => 'kompetisi-sains-cilik-amma',
                'category' => 'Event Festival',
                'target_age' => 'SD/MI',
                'price' => 50000,
                'image' => null,
                'description' => 'Ajang unjuk karya proyek sains sederhana dan tantangan problem-solving seru bagi ilmuwan cilik dari seluruh sekolah.',
                'is_active' => true,
            ],
        ];

        foreach ($programs as $prog) {
            Program::updateOrCreate(['slug' => $prog['slug']], $prog);
        }
    }
}
