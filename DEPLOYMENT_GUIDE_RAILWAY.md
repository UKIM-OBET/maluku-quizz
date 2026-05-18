# 🚀 PANDUAN DEPLOYMENT MALUKU QUIZZ KE RAILWAY

> **Status**: Kode sudah siap deploy ✅  
> **GitHub**: https://github.com/UKIM-OBET/maluku-quizz  
> **Railway**: https://railway.app

---

## LANGKAH-LANGKAH DEPLOYMENT (5 MENIT)

### 1️⃣ BUKA RAILWAY & LOGIN GITHUB
```
1. Buka: https://railway.app
2. Klik "Start New Project"
3. Pilih "Deploy from GitHub repo"
4. Authorize Railway untuk GitHub akses
```

### 2️⃣ PILIH REPOSITORY
```
- Repository: UKIM-OBET/maluku-quizz
- Branch: main
- Klik "Deploy Now"
```

Railway akan otomatis:
- Detect Dockerfile
- Start building Docker image
- Deploy ke server Railway

⏳ **Tunggu 2-3 menit** hingga build selesai (lihat Logs tab)

### 3️⃣ ADD MYSQL DATABASE ⚠️ PENTING!
Aplikasi memerlukan MySQL untuk berjalan:

```
1. Railway Dashboard → Pilih project "maluku-quizz"
2. Klik "+ Add Plugin"
3. Pilih "MySQL"
4. Tunggu MySQL container start (1-2 menit)
5. Railway otomatis generate:
   - DB_HOST
   - DB_PORT
   - DB_USERNAME
   - DB_PASSWORD
```

### 4️⃣ SET ENVIRONMENT VARIABLES
Setelah MySQL running, setup variables:

```
1. Railway Dashboard → Variables tab
2. Tambahkan variables berikut:
```

| Key | Value | Keterangan |
|-----|-------|-----------|
| `APP_NAME` | `MalukuQuizz` | Nama aplikasi |
| `APP_ENV` | `production` | Environment |
| `APP_KEY` | `base64:XXX...` | Generate di local: `php artisan key:generate` |
| `APP_DEBUG` | `false` | Jangan enable di production |
| `APP_URL` | Isi nanti | Lihat step 5 |
| `LOG_CHANNEL` | `stack` | Logging |
| `LOG_LEVEL` | `info` | Log level |
| `BROADCAST_DRIVER` | `log` | Driver broadcast |
| `CACHE_DRIVER` | `file` | Cache driver |
| `QUEUE_CONNECTION` | `sync` | Queue |
| `SESSION_DRIVER` | `file` | Session |
| `SESSION_LIFETIME` | `120` | Session timeout (menit) |
| `FILESYSTEM_DISK` | `public` | Disk |

### 5️⃣ DAPATKAN APP_KEY
Jika APP_KEY belum ada:

**Local Terminal:**
```bash
php artisan key:generate
```

**Output di .env:**
```
APP_KEY=base64:H8pRLMPWblIjTTNRW1zQoMkd+pCRL3Rw8rnPKNhQdzQ=
```

Copy value `base64:...` ke Railway Variables.

### 6️⃣ DAPATKAN APP_URL
Setelah MySQL setup:

```
1. Railway Dashboard → Logs tab
2. Tunggu deploy selesai
3. Klik "Open App" atau lihat Deployments
4. Copy URL: https://your-app.up.railway.app
5. Paste ke Variables → APP_URL
```

### 7️⃣ REDEPLOY
Setelah semua variables set:

```
1. Railway Dashboard → Deployments tab
2. Klik "Redeploy" tombol
3. Tunggu deploy selesai (2-3 menit)
```

### 8️⃣ AKSES APLIKASI
```
1. Railway Dashboard → Deployments
2. Klik "Open App"
3. Tunggu 30-60 detik (migrations berjalan)
4. ✅ Aplikasi live!
```

---

## ✅ CHECKLIST SEBELUM DEPLOY

- [ ] GitHub repo sudah push: `UKIM-OBET/maluku-quizz`
- [ ] Kode fixes sudah di-commit (PORT 8000, npm build, etc)
- [ ] Sudah ada Railway account
- [ ] MySQL plugin sudah ditambahkan
- [ ] Environment variables sudah di-set
- [ ] APP_KEY sudah di-copy dari local
- [ ] APP_URL sudah diisi dengan Railway URL

---

## 🔍 TROUBLESHOOT

### ❌ Build gagal: "npm install error"
**Solusi:**
```bash
# Local: pastikan package-lock.json ter-commit
git add package-lock.json composer.lock
git commit -m "Lock dependencies"
git push origin main
# Railway: Redeploy
```

### ❌ App crash: "502 Bad Gateway"
**Check:**
1. Railway Logs tab → lihat error message
2. Pastikan APP_KEY diisi di Variables
3. Pastikan MySQL running (lihat MySQL container)
4. Tunggu 30 detik setelah MySQL start

**Solusi:**
```
1. Railway Dashboard → Redeploy
2. Monitor Logs
3. Tunggu migrations selesai
```

### ❌ Database error: "Connection refused"
**Solusi:**
1. Pastikan `DB_HOST=mysql.railway.internal`
2. Pastikan `DB_PORT=3306` (atau lihat di MySQL plugin)
3. Tunggu 1-2 menit setelah MySQL container start
4. Redeploy aplikasi

### ❌ CSS tidak ter-load (halaman jelek)
**Penyebab:** Tailwind CSS tidak di-build
**Check:**
1. Railway Logs → search "npm run build"
2. Pastikan build sukses
3. Refresh browser (Ctrl+Shift+R)

### ❌ Port error: "Address already in use"
**Solusi:**
1. Railway menggunakan PORT 8000 (sudah fixed)
2. Redeploy jika perlu
3. Check `Dockerfile` dan `railway.json` konsisten

---

## 📊 MONITORING

**Logs Real-time:**
- Railway Dashboard → Logs tab
- Auto-refresh setiap 5 detik

**Database:**
- Railway Dashboard → MySQL service
- Lihat database, tables, connections

**Deployments:**
- Railway Dashboard → Deployments tab
- Lihat history dan redeploy jika perlu

---

## 💡 TIPS

1. **First deploy lambat?**
   - Normal! Build, migrations, CSS compile = 2-3 menit

2. **Perlu restart aplikasi?**
   - Railway Dashboard → Redeploy

3. **Database backup?**
   - Railway otomatis backup MySQL
   - Bisa restore dari Railway Dashboard

4. **Scale up?**
   - Railway Dashboard → Settings → Machine Type
   - Upgrade RAM/CPU jika traffic tinggi

5. **Domain custom?**
   - Railway Dashboard → Settings → Domain
   - Bisa pakai subdomain atau custom domain

---

## 🎯 SELESAI!

Setelah app live, Anda bisa:
- ✅ Share link dengan teman/keluarga
- ✅ Monitor logs real-time
- ✅ Update kode → push GitHub → Railway auto-deploy
- ✅ Scale machine jika diperlukan

---

**Questions?**
- Railway Docs: https://docs.railway.app
- Laravel Docs: https://laravel.com/docs
- GitHub: https://github.com/UKIM-OBET/maluku-quizz

**Happy deploying! 🚀**
