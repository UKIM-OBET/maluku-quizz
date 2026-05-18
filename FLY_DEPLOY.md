# Deploy ke Fly.io (Panduan Cepat)

1. Install `flyctl`:

- Windows (PowerShell):
```
winget install flyctl
```
- Alternatif (curl installer):
```
iwr https://fly.io/install.ps1 -useb | iex
```

2. Login:
```
flyctl auth login
```

3. Inisialisasi aplikasi (jalankan dari root proyek):
```
cd c:\Users\user\MALUKUQUIZZ
flyctl launch --name maluku-quizz --region iad --no-deploy
```

4. Set secrets (ganti nilainya sesuai `.env` Anda):
```
flyctl secrets set APP_ENV=production APP_KEY="base64:..." APP_URL="https://maluku-quizz.fly.dev"
# Jika menggunakan database, tambahkan DB_CONNECTION, DB_HOST, DB_NAME, DB_USER, DB_PASS
```

5. Deploy:
```
flyctl deploy --remote-only
```

6. Logs dan troubleshooting:
```
flyctl logs -a maluku-quizz
flyctl status -a maluku-quizz
```

Catatan: Dockerfile di root menggunakan `php artisan serve` untuk kemudahan. Untuk produksi, pertimbangkan menyiapkan `php-fpm` + `nginx` atau menggunakan buildpack yang lebih cocok.
