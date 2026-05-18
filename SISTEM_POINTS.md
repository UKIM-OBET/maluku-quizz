# Sistem Points untuk Quiz

## Deskripsi Sistem

Sistem point ini memungkinkan guru untuk memberikan poin kepada siswa yang telah menyelesaikan quiz. Setiap quiz memiliki nilai poin yang dapat dikonfigurasi oleh guru, dan siswa akan mendapatkan poin berdasarkan persentase jawaban yang benar.

## Fitur Utama

### 1. Konfigurasi Poin Quiz oleh Guru
- Guru dapat menentukan jumlah poin untuk setiap quiz saat membuat atau mengedit quiz
- Default poin adalah 100 poin per quiz
- Range poin: 0 - 10000

### 2. Perhitungan Poin Siswa
- Poin dihitung berdasarkan persentase jawaban benar
- Formula: `(score_percentage / 100) × quiz_points`
- Contoh: Jika siswa benar 80% dan quiz bernilai 100 poin, siswa mendapat 80 poin

### 3. Tracking Total Points
- Setiap siswa memiliki `total_points` yang terakumulasi
- Poin otomatis ditambahkan ke total saat siswa menyelesaikan quiz

### 4. Leaderboard
- Menampilkan ranking 20 siswa dengan total poin tertinggi
- Siswa dapat melihat posisi mereka di leaderboard (baris highlight)
- Menampilkan poin yang diperoleh dari setiap quiz

## Database Changes

### Tabel Quizzes
- Tambah kolom: `points` (INTEGER, default 0)

### Tabel Quiz Results
- Tambah kolom: `points_awarded` (INTEGER, default 0)

### Tabel Users
- Tambah kolom: `total_points` (INTEGER, default 0)

## File yang Dimodifikasi

### Models
- `App\Models\Quiz` - Tambah field `points`, relasi `results()`
- `App\Models\QuizResult` - Tambah field `points_awarded`
- `App\Models\User` - Tambah field `total_points`, methods `addPoints()`, `getPoints()`

### Controllers
- `App\Http\Controllers\QuizController` - Update `submit()` method untuk award points
- `App\Http\Controllers\TeacherQuizController` - Update validation untuk points
- `App\Http\Controllers\LeaderboardController` - Ganti ranking dari quiz scores ke total points

### Views
- `resources/views/teacher/quizzes/create.blade.php` - Tambah form points
- `resources/views/teacher/quizzes/edit.blade.php` - Tambah form points
- `resources/views/teacher/quizzes/index.blade.php` - Tampilkan points di tabel
- `resources/views/student/quizzes/index.blade.php` - Tampilkan available points
- `resources/views/student/leaderboard.blade.php` - Update untuk menampilkan poin system

### Migrations
- `2026_04_24_000006_add_points_to_quizzes_table.php`
- `2026_04_24_000007_add_points_to_quiz_results_table.php`
- `2026_04_24_000008_add_total_points_to_users_table.php`

## Cara Menggunakan

### Untuk Guru
1. Buat atau edit quiz
2. Tentukan jumlah poin untuk quiz tersebut
3. Simpan perubahan

### Untuk Siswa
1. Lihat daftar quiz dengan poin yang tersedia
2. Kerjakan quiz
3. Lihat poin yang diperoleh setelah submit
4. Cek total poin di leaderboard

## Langkah Instalasi

1. Run migrations:
   ```
   php artisan migrate
   ```

2. Jika ada kuis lama, update default points melalui SQL atau migration baru

3. Test sistem dengan membuat quiz baru dan mengerjakan quiz sebagai siswa
