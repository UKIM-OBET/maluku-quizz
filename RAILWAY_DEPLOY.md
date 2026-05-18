# Deploy ke Railway (Gratis & Mudah)

Railway adalah layanan hosting gratis yang paling mudah untuk Laravel. Tidak perlu CLI—cukup click di website.

## Langkah-langkah

### 1. Buat Akun Railway (Free)
- Buka https://railway.app
- Sign up dengan GitHub (paling mudah) atau email
- Verifikasi akun

### 2. Buat New Project
- Klik "+ New Project"
- Pilih "Deploy from GitHub repo"
- Authorize Railway untuk akses GitHub

### 3. Connect GitHub Repository
- Pilih repository: `UKIM-OBET/MALUKUQUIZZ`
- Klik "Deploy Now"

Railway akan otomatis:
- Detect Dockerfile
- Build Docker image
- Deploy ke server Railway

### 4. Add MySQL Database
⚠️ **WAJIB** - Aplikasi membutuhkan database MySQL untuk berjalan
- Di Railway project, klik "+ Add Plugin"
- Pilih "MySQL"
- Railway otomatis isi `DB_HOST`, `DB_PORT`, `DB_USERNAME`, `DB_PASSWORD`

### 5. Set Environment Variables
Setelah MySQL ditambah, buka project → Variables tab dan set:

```env
APP_NAME=MalukuQuizz
APP_ENV=production
APP_KEY=base64:YOUR_GENERATED_KEY_HERE
APP_DEBUG=false
APP_URL=https://your-railway-app.up.railway.app

LOG_CHANNEL=stack
LOG_LEVEL=info

DB_CONNECTION=mysql
DB_HOST=mysql.railway.internal
DB_PORT=3306
DB_DATABASE=railway
DB_USERNAME=root
DB_PASSWORD=YOUR_MYSQL_PASSWORD

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120
FILESYSTEM_DISK=public
```

**IMPORTANT**: Ganti `YOUR_RAILROAD_APP_URL` dengan URL yang Railway generate otomatis.

### 6. Cara Mendapatkan APP_KEY
Jika APP_KEY belum ada, generate di local:
```bash
php artisan key:generate
```
Kopy value `APP_KEY` dari `.env` local, lalu paste di Railway Variables.

### 7. Deploy & Redeploy
- Setiap push ke GitHub → Railway otomatis deploy ulang
- Atau klik "Redeploy" di Railway dashboard

### 8. Access Your App
- Railway memberikan URL otomatis saat deploy selesai
- Klik "View Deployment" atau "Open App" di dashboard
- First load biasanya lambat karena migrations berjalan

---

## Fitur Railway Gratis
- ✅ Up to 5 projects
- ✅ GitHub auto-deploy
- ✅ MySQL database included
- ✅ Free tier: ~$5/bulan usage (gratis 72 jam pertama, kemudian berbayar sesuai usage)
- ✅ Custom domain support
- ✅ Logs & monitoring real-time

---

## Troubleshoot

**Error: "Build failed"**
- Buka Logs tab di Railway dashboard
- Periksa error message
- Umum: npm atau composer install gagal → check `npm-debug.log` atau composer error output
- Solusi: pastikan `package-lock.json` dan `composer.lock` ter-commit ke git

**Error: "502 Bad Gateway" atau aplikasi crash**
- Buka Logs tab di Railway dashboard untuk melihat Laravel error
- Pastikan `APP_KEY` sudah set di Environment Variables
- Pastikan MySQL sudah ter-setup dan running (lihat MySQL service tab)
- Tunggu ~30 detik setelah MySQL container start

**Database connection error: "Connection refused" atau "SQLSTATE[HY000]"**
- Tunggu ~1 menit setelah MySQL container start
- Pastikan `DB_HOST=mysql.railway.internal` (bukan localhost atau 127.0.0.1)
- Pastikan `DB_DATABASE=railway` (atau sesuai yang di-generate Railway)
- Check Railway Logs untuk detail error

**Port error: "Address already in use"**
- Railway akan otomatis assign PORT 8000
- Pastikan Dockerfile dan `railway.json` konsisten menggunakan port 8000
- Check: `ENV PORT 8000` dan `EXPOSE 8000` di Dockerfile

**CSS tidak ter-load (halaman jelek)**
- Aplikasi menggunakan Tailwind CSS yang harus di-build saat deploy
- Pastikan Dockerfile menjalankan `npm install && npm run build`
- Check Logs apakah build CSS berhasil
- Jika gagal, periksa `package.json` dan `postcss.config.js`

---

## Tips Deployment

1. **Monitoring Real-time**
   - Railway Dashboard → Logs tab
   - Bisa live-tail atau search error messages

2. **Rebuild & Redeploy**
   - Railway Dashboard → Deployments tab
   - Klik "Redeploy" jika ingin force-rebuild

3. **SSH ke Container (advanced)**
   ```bash
   npm install -g @railway/cli
   railway login
   railway shell
   ```

4. **Scale Machine**
   - Railway Dashboard → Settings → Machine Type
   - Upgrade RAM/CPU jika traffic tinggi

5. **Check Database Backups**
   - Railway otomatis backup MySQL setiap hari
   - Bisa restore dari Railway Dashboard jika ada masalah

---

## URLs
- **Railway App**: https://railway.app
- **Railway Docs**: https://docs.railway.app
- **Laravel Docs**: https://laravel.com/docs

