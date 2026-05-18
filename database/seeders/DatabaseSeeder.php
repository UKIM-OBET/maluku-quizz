<?php

namespace Database\Seeders;

use App\Models\Culture;
use App\Models\Quiz;
use App\Models\QuizQuestion;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Guru Maluku',
            'email' => 'guru@example.com',
            'password' => Hash::make('password123'),
            'role' => 'guru',
        ]);

        User::create([
            'name' => 'Murid Maluku',
            'email' => 'murid@example.com',
            'password' => Hash::make('password123'),
            'role' => 'murid',
        ]);

        Culture::create([
            'title' => 'Upacara Adat Maluku Tengah',
            'summary' => 'Pengenalan upacara adat khas Maluku Tengah yang penuh makna kebersamaan.',
            'content' => 'Upacara adat Maluku Tengah menampilkan tarian, musik tradisional, dan ritual penghormatan kepada leluhur. Warga berkumpul untuk menjaga nilai budaya dengan nuansa alam pesisir dan hutan tropis.',
            'image' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f',
        ]);

        Culture::create([
            'title' => 'Kuliner Tradisional Ikan Kuah Kuning',
            'summary' => 'Makanan khas Maluku Tengah dengan cita rasa rempah dan segar.',
            'content' => 'Ikan kuah kuning dibuat dari ikan laut segar, kunyit, serai, dan daun kemangi. Hidangan ini populer dalam perayaan keluarga dan memperkuat kearifan lokal Maluku.',
            'image' => 'https://images.unsplash.com/photo-1514516870921-3a2a1e8ead3a',
        ]);

        Culture::create([
            'title' => 'Tari Cakalele',
            'summary' => 'Tarian tradisional peperangan yang menggambarkan semangat pahlawan Maluku.',
            'content' => 'Tari Cakalele biasanya dibawakan oleh penari pria dengan properti tombak dan perisai, penuh gerakan dinamis. Tarian ini sering hadir dalam upacara adat dan sambutan kehormatan.',
            'image' => 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee',
        ]);

        Culture::create([
            'title' => 'Kerajinan Anyaman Maluku',
            'summary' => 'Produk anyaman lokal yang dibuat dari bahan alami seperti rotan dan pandan.',
            'content' => 'Anyaman tradisional Maluku dibuat untuk kebutuhan rumah tangga dan dekorasi, mempertahankan motif lokal dan teknik tangan turun-temurun.',
            'image' => 'https://images.unsplash.com/photo-1523958203904-cdcb402031fd',
        ]);

        $quiz = Quiz::create([
            'title' => 'Quiz Budaya Maluku Tengah',
            'description' => 'Uji pemahamanmu tentang budaya dan tradisi Maluku Tengah.',
        ]);

        QuizQuestion::create([
            'quiz_id' => $quiz->id,
            'question' => 'Apa bahan utama pada ikan kuah kuning khas Maluku?',
            'options' => ['Ikan laut', 'Ayam kampung', 'Daging sapi', 'Tempe'],
            'answer' => 'Ikan laut',
        ]);

        QuizQuestion::create([
            'quiz_id' => $quiz->id,
            'question' => 'Apa tujuan utama upacara adat di Maluku Tengah?',
            'options' => ['Merayakan teknologi modern', 'Menghormati leluhur dan kebersamaan', 'Menjual produk lokal', 'Memperkenalkan permainan baru'],
            'answer' => 'Menghormati leluhur dan kebersamaan',
        ]);

        QuizQuestion::create([
            'quiz_id' => $quiz->id,
            'question' => 'Warna dominan yang sering muncul pada motif budaya Maluku adalah?',
            'options' => ['Biru dan emas', 'Hitam dan putih', 'Merah dan hijau', 'Kuning dan ungu'],
            'answer' => 'Biru dan emas',
        ]);

        $quiz2 = Quiz::create([
            'title' => 'Quiz Singkat Tradisi Maluku Tengah',
            'description' => 'Kuis sederhana untuk menguji pengetahuan awal tentang tradisi dan kehidupan sehari-hari di Maluku Tengah.',
        ]);

        QuizQuestion::create([
            'quiz_id' => $quiz2->id,
            'question' => 'Apa nama tari perang tradisional dari Maluku Tengah?',
            'options' => ['Tari Cakalele', 'Tari Saman', 'Tari Pendet', 'Tari Kecak'],
            'answer' => 'Tari Cakalele',
        ]);

        QuizQuestion::create([
            'quiz_id' => $quiz2->id,
            'question' => 'Bahan utama pada anyaman tradisional Maluku umumnya terbuat dari?',
            'options' => ['Rotan atau pandan', 'Kertas', 'Kain sutra', 'Plastik'],
            'answer' => 'Rotan atau pandan',
        ]);

        QuizQuestion::create([
            'quiz_id' => $quiz2->id,
            'question' => 'Upacara adat di Maluku Tengah biasanya dilakukan untuk?',
            'options' => ['Menghormati leluhur', 'Melakukan kompetisi modern', 'Berlibur', 'Membangun gedung baru'],
            'answer' => 'Menghormati leluhur',
        ]);
    }
}
