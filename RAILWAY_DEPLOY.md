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
- Pilih repository: `UKIM-OBET/maluku-quizz`
- Klik "Deploy Now"

Railway akan otomatis:
- Detect Dockerfile
- Build Docker image
- Deploy ke server Railway

### 4. Set Environment Variables
Setelah deploy, buka project → Variables tab:

```
APP_NAME=MalukuQuizz
APP_ENV=production
APP_KEY=base64:Dd9nxCXMKFHwyGSqOdoMIvNWCrqHwnAXhv1k8shqW6w=
APP_DEBUG=false
APP_URL=https://{your-railway-url}
LOG_CHANNEL=stack
LOG_LEVEL=info

DB_CONNECTION=mysql
DB_HOST=mysql.railway.internal
DB_PORT=3306
DB_DATABASE=railway
DB_USERNAME=root
DB_PASSWORD={auto-generated}

CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_CONNECTION=sync
FILESYSTEM_DISK=public
```

### 5. Add MySQL Database (Optional tapi Recommended)
- Di Railway project, klik "+ Add Plugin"
- Pilih "MySQL"
- Railway otomatis isi `DB_HOST`, `DB_PASSWORD`, dll

### 6. Deploy & Redeploy
- Setiap push ke GitHub → Railway otomatis deploy ulang
- Atau klik "Redeploy" di Railway dashboard

### 7. Access Your App
- Railway memberikan URL otomatis: `https://maluku-quizz-production.up.railway.app` (atau mirip)
- Klik "View Deployment" di dashboard

---

## Fitur Railway Gratis
- ✅ Up to 5 projects
- ✅ GitHub auto-deploy
- ✅ MySQL database included
- ✅ Free tier: ~$5/bulan usage (gratis 72 jam pertama)
- ✅ Custom domain support
- ✅ Logs & monitoring

---

## Troubleshoot

**Error: "Build failed"**
- Buka Logs tab di Railway dashboard
- Periksa apakah `composer install` berhasil

**Error: "502 Bad Gateway"**
- Pastikan `APP_KEY` sudah set di Environment Variables
- Lihat Logs untuk detail error Laravel

**Database connection error**
- Tunggu ~30 detik setelah MySQL container start
- Pastikan `DB_HOST=mysql.railway.internal` (bukan localhost)

---

## Tips
- Gunakan Railway CLI untuk deploy lokal: `npm install -g @railway/cli` lalu `railway up`
- Monitor logs real-time: Railway Dashboard → Logs tab
- Scale machine: Settings → Machine Type → Pilih size

---

**URL Deploy Railway:** https://railway.app
**Docs:** https://docs.railway.app
