<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $galleries = [
            [
                'title' => 'Membuat Cup Walkie Talkies',
                'category' => 'Eksperimen',
                'image' => '',
                'description' => 'Anak-anak bereksperimen membuat alat bantu dengar dan komunikasi jarak jauh secara sederhana dari cup kertas dan benang.',
            ],
            [
                'title' => 'Outdoor Sensory Play',
                'category' => 'Workshop',
                'image' => '',
                'description' => 'Bermain sambil belajar di alam terbuka dengan berbagai alat jelajah untuk menstimulasi panca indera.',
            ],
            [
                'title' => 'Virtual Playdate Sains',
                'category' => 'Workshop',
                'image' => '',
                'description' => 'Keseruan belajar sains dari rumah melalui sesi interaktif yang dipandu oleh instruktur berpengalaman.',
            ],
            [
                'title' => 'Sensory Obstacle Course',
                'category' => 'Workshop',
                'image' => '',
                'description' => 'Melatih motorik kasar dan ketangkasan anak melalui rintangan sensorik yang seru dan menantang.',
            ],
            [
                'title' => 'Mystery Box Experiment',
                'category' => 'Eksperimen',
                'image' => '',
                'description' => 'Menebak dan mengidentifikasi berbagai benda menarik yang tersembunyi di dalam kotak misteri sains.',
            ],
            [
                'title' => 'Interactive Science Session',
                'category' => 'Science Festival',
                'image' => '',
                'description' => 'Sesi tanya jawab dan demonstrasi sains spektakuler yang interaktif dan melibatkan partisipasi antusias anak-anak.',
            ],
            [
                'title' => 'Panggung Sains Spektakuler',
                'category' => 'Science Festival',
                'image' => '',
                'description' => 'Demonstrasi reaksi kimia ramah anak yang menghasilkan busa warna-warni dan letupan sains yang memukau.',
            ],
            [
                'title' => 'Roadshow Sains di TK Telkom',
                'category' => 'Roadshow',
                'image' => '',
                'description' => 'Kunjungan tim Amma Science Kids memberikan workshop pembuatan roket air sederhana bersama para murid dan guru.',
            ],
            [
                'title' => 'Eksperimen Gelembung Raksasa',
                'category' => 'Eksperimen',
                'image' => '',
                'description' => 'Menyelidiki tegangan permukaan air dan elastisitas sabun melalui kreasi bubble raksasa di halaman terbuka.',
            ],
            [
                'title' => 'Roadshow Edukasi MI Al-Ikhlas',
                'category' => 'Roadshow',
                'image' => '',
                'description' => 'Pengenalan konsep magnet, gravitasi, dan optik cahaya melalui alat peraga interaktif yang dibuat sendiri.',
            ],
            [
                'title' => 'Workshop Mikroskop Cilik',
                'category' => 'Workshop',
                'image' => '',
                'description' => 'Anak-anak mengamati struktur daun, kristal garam, dan serat kain menggunakan mikroskop portabel.',
            ],
            [
                'title' => 'Science Booth Expo 2026',
                'category' => 'Science Festival',
                'image' => '',
                'description' => 'Stan pameran sains interaktif dengan puluhan mini-eksperimen yang dapat dicoba langsung oleh pengunjung festival.',
            ],
        ];

        foreach ($galleries as $item) {
            Gallery::firstOrCreate(
                ['title' => $item['title']],
                $item
            );
        }
    }
}
