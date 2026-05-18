# Maluku Tengah Culture Gamification Website

Sistem pembelajaran gamifikasi budaya Maluku Tengah berbasis Laravel dan MySQL.

## Fitur utama
- Authentication untuk `guru` dan `murid`
- CRUD informasi budaya oleh guru
- Quiz interaktif untuk murid
- Leaderboard nilai quiz
- Panel progress guru untuk memonitor hasil murid
- Tema tampilan dengan sentuhan budaya Maluku

## Struktur
- `app/Http/Controllers`
- `app/Models`
- `database/migrations`
- `database/seeders`
- `resources/views`
- `public/css`

## Instalasi
1. Pastikan `composer` dan `php` terpasang.
2. Jalankan `composer install`.
3. Salin `.env.example` menjadi `.env`.
4. Isi konfigurasi database MySQL.
5. Jalankan `php artisan migrate --seed`.
6. Jalankan `php artisan serve`.

## Akun awal
- Guru: `guru@example.com`
- Siswa: `murid@example.com`

> Catatan: Proyek ini siap digunakan setelah dependensi Laravel diinstal melalui Composer.
