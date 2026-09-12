<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $catTips = Category::where('slug', 'tips-orang-tua')->first();
        $catExp = Category::where('slug', 'eksperimen-seru')->first();
        $catStory = Category::where('slug', 'kisah-inspiratif')->first();
        $catProgram = Category::where('slug', 'info-program')->first();

        $articles = [
            [
                'title' => 'Mengapa Eksperimen Fisika Sederhana Sangat Penting untuk Perkembangan Kognitif Anak?',
                'slug' => 'mengapa-eksperimen-fisika-sederhana-sangat-penting-untuk-perkembangan-kognitif-anak',
                'category_id' => $catExp?->id,
                'content' => '<p>Memahami konsep fisika dasar tidak perlu menggunakan alat laboratorium yang rumit. Dengan bahan sehari-hari seperti botol plastik, balon, dan air, anak-anak dapat membangun intuisi saintifik yang kuat sejak dini.</p><p>Eksperimen langsung melatih daya nalar, rasa ingin tahu, serta kemampuan memecahkan masalah yang esensial bagi tumbuh kembang anak.</p>',
                'image' => null,
                'is_published' => true,
                'published_at' => now()->subDays(2),
            ],
            [
                'title' => 'Keajaiban Warna: Belajar Pencampuran Warna Dasar',
                'slug' => 'keajaiban-warna-belajar-pencampuran-warna-dasar',
                'category_id' => $catExp?->id,
                'content' => '<p>Panduan langkah demi langkah untuk melakukan eksperimen pencampuran warna yang aman dan menyenangkan di rumah.</p><p>Anak-anak dapat melihat langsung bagaimana perpaduan warna primer menghasilkan warna sekunder secara menakjubkan.</p>',
                'image' => null,
                'is_published' => true,
                'published_at' => now()->subDays(4),
            ],
            [
                'title' => '5 Cara Mudah Menjawab Pertanyaan "Mengapa?" dari Si Kecil',
                'slug' => '5-cara-mudah-menjawab-pertanyaan-mengapa-dari-si-kecil',
                'category_id' => $catTips?->id,
                'content' => '<p>Anak-anak secara alami memiliki rasa ingin tahu yang besar. Pelajari strategi komunikasi efektif untuk merespons pertanyaan kritis mereka tanpa mematikan semangat bereksplorasi.</p>',
                'image' => null,
                'is_published' => true,
                'published_at' => now()->subDays(7),
            ],
            [
                'title' => 'Pendaftaran Kelas Holiday Camp Sains Telah Dibuka!',
                'slug' => 'pendaftaran-kelas-holiday-camp-sains-telah-dibuka',
                'category_id' => $catProgram?->id,
                'content' => '<p>Liburan sekolah akan segera tiba. Bergabunglah dengan program spesial dua minggu yang penuh dengan eksperimen tematik seru bersama mentor berpengalaman dari Amma Science Kids.</p>',
                'image' => null,
                'is_published' => true,
                'published_at' => now()->subDays(10),
            ],
            [
                'title' => 'Laporan Lapangan: Festival Roket Air Amma Science 2024',
                'slug' => 'laporan-lapangan-festival-roket-air-amma-science-2024',
                'category_id' => $catStory?->id,
                'content' => '<p>Lebih dari 50 ilmuwan cilik berpartisipasi dalam merancang, membangun, dan meluncurkan roket air mereka sendiri di lapangan terbuka.</p>',
                'image' => null,
                'is_published' => true,
                'published_at' => now()->subDays(14),
            ],
            [
                'title' => 'Mengamati Struktur Daun: Biologi Dasar di Halaman Rumah',
                'slug' => 'mengamati-struktur-daun-biologi-dasar-di-halaman-rumah',
                'category_id' => $catExp?->id,
                'content' => '<p>Ajak anak mengeksplorasi alam sekitar. Dengan bermodalkan kaca pembesar, halaman rumah bisa menjadi laboratorium biologi yang penuh misteri indah.</p>',
                'image' => null,
                'is_published' => true,
                'published_at' => now()->subDays(18),
            ],
            [
                'title' => 'Membangun Kebiasaan Membaca Buku Sains Sebelum Tidur',
                'slug' => 'membangun-kebiasaan-membaca-buku-sains-sebelum-tidur',
                'category_id' => $catTips?->id,
                'content' => '<p>Membacakan dongeng bertema alam semesta dan sains dapat merangsang imajinasi anak sebelum beristirahat sekaligus mempererat hubungan batin anak dan orang tua.</p>',
                'image' => null,
                'is_published' => true,
                'published_at' => now()->subDays(22),
            ],
            [
                'title' => 'Kisah Inspiratif: Eksplorasi Sains Membantu Anak Lebih Percaya Diri',
                'slug' => 'kisah-inspiratif-eksplorasi-sains-membantu-anak-lebih-percaya-diri',
                'category_id' => $catStory?->id,
                'content' => '<p>Cerita dari orang tua tentang bagaimana keterlibatan dalam eksperimen sains mandiri mengubah sifat pemalu anak menjadi lebih berani mengemukakan pendapat.</p>',
                'image' => null,
                'is_published' => true,
                'published_at' => now()->subDays(26),
            ],
        ];

        foreach ($articles as $art) {
            Article::updateOrCreate(['slug' => $art['slug']], $art);
        }
    }
}
