# 🌐 Panduan Lengkap: Hosting di GitHub & Deploy Online

> **Catatan**: Aplikasi Anda adalah Laravel (backend PHP), bukan static site. Jadi kita perlu push ke GitHub, lalu deploy ke service hosting yang support PHP.

---

## 📋 Ringkasan Opsi Hosting

| Platform | Biaya | Kemudahan | Cocok Untuk |
|----------|-------|----------|-----------|
| **Vercel** ✅ | Gratis + Paid | Sangat Mudah | Full-stack, serverless |
| **Railway** | Gratis + Paid | Mudah | Production PHP/Laravel |
| **Render** | Gratis + Paid | Mudah | Full-stack, database |
| **Heroku** | Berbayar | Mudah | Legacy (tidak lagi gratis) |
| **GitHub Pages** | Gratis | Mudah | Hanya untuk static sites ❌ |

---

## ✅ OPSI 1: VERCEL (Rekomendasi Pertama)

**Kelebihan**: Gratis tier bagus, auto-deploy dari GitHub, performa cepat
**Setup**: ~5 menit

### Step 1: Push ke GitHub
```bash
# Buka terminal di folder project
cd c:\Users\user\MALUKUQUIZZ

# Setup git
git config user.name "Your Name"
git config user.email "your.email@gmail.com"

# Add & commit
git add .
git commit -m "Initial commit - Maluku Quizz"

# Buat repo baru di https://github.com/new
# Nama: maluku-quizz
# Visibility: Public

# Push
git remote add origin https://github.com/YOUR-USERNAME/maluku-quizz.git
git branch -M main
git push -u origin main
```

### Step 2: Connect GitHub ke Vercel
1. Buka https://vercel.com
2. Klik "Sign up" → Pilih "Sign up with GitHub"
3. Authorize & login
4. Klik "New Project"
5. Pilih repository "maluku-quizz"
6. Klik "Import"

### Step 3: Konfigurasi Build
- **Build Command**: `composer install && npm install && npm run build:css`
- **Output Directory**: `public`
- **Root Directory**: `.` (default)

### Step 4: Set Environment Variables
Di dashboard Vercel, buka "Settings" → "Environment Variables", tambahkan:

```
APP_NAME=MalukuQuizz
APP_ENV=production
APP_DEBUG=false
APP_KEY=base64:xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
APP_URL=https://maluku-quizz.vercel.app

CACHE_DRIVER=file
SESSION_DRIVER=cookie
QUEUE_CONNECTION=sync
FILESYSTEM_DISK=public
```

**Dapatkan APP_KEY**:
```bash
# Jalankan di local
php artisan key:generate --show
# Copy hasilnya ke Vercel
```

### Step 5: Database
**Opsi A - Local (testing)**:
```
DB_HOST=your.ip.address
DB_DATABASE=malukuquizz
DB_USERNAME=root
DB_PASSWORD=
```

**Opsi B - PlanetScale (Cloud MySQL - Recommended)**:
1. Buka https://planetscale.com
2. Sign up gratis
3. Create database: `malukuquizz`
4. Copy credentials:
```
DB_CONNECTION=mysql
DB_HOST=xxxxx.mysql.planetscale.com
DB_DATABASE=malukuquizz
DB_USERNAME=xxxxx
DB_PASSWORD=pscale_pw_xxxxx
```

### Step 6: Deploy
Setelah set env vars, klik "Deploy"
- ⏳ Tunggu 2-3 menit
- ✅ Akses di `https://YOUR-PROJECT.vercel.app`

### Automatic Updates 🔄
Setiap kali push ke GitHub:
```bash
git add .
git commit -m "Description of changes"
git push
```
→ Vercel otomatis deploy!

---

## ✅ OPSI 2: RAILWAY (Alternatif Bagus)

**Kelebihan**: Full control, support database terbaik, PostgreSQL/MySQL included
**Setup**: ~5 menit

### Step 1: Push ke GitHub (sama seperti Vercel)

### Step 2: Deploy di Railway
1. Buka https://railway.app
2. Klik "Create" → "New Project"
3. Pilih "Deploy from GitHub repo"
4. Authorize & select "maluku-quizz"
5. Klik "Deploy"

### Step 3: Configure Services
Railway otomatis detect Laravel. Tambahkan environment variables:

```
APP_KEY=base64:xxxxx
APP_DEBUG=false
APP_ENV=production
```

### Step 4: Database
Railway tawarkan PostgreSQL/MySQL gratis untuk testing:
1. Di Railway dashboard: "New" → "MySQL" atau "PostgreSQL"
2. Credentials auto-inject ke app

### Deploy Link
Akses: `https://maluku-quizz-production.up.railway.app`

---

## ✅ OPSI 3: RENDER (Alternatif Mudah)

**Kelebihan**: Free tier with PostgreSQL, simple deployment
**Setup**: ~5 menit

### Step 1: Push ke GitHub

### Step 2: Deploy di Render
1. Buka https://render.com
2. Klik "New +" → "Web Service"
3. Connect GitHub, select "maluku-quizz"
4. Configure:
   - **Build Command**: `composer install && npm install && npm run build:css`
   - **Start Command**: `php -S 0.0.0.0:10000 -t public`

### Step 3: Environment Variables
Tambahkan di Render dashboard

### Deploy Link
Akses: `https://maluku-quizz.onrender.com`

---

## 📱 Checklist Setup Lengkap

### Local (di computer Anda):
- [ ] Run `php artisan migrate` (setup database)
- [ ] Test aplikasi di `localhost:8000`
- [ ] Run `npm run build:css` (compile Tailwind)
- [ ] Commit semua perubahan

### GitHub:
- [ ] Create account di https://github.com (free)
- [ ] Create new repository "maluku-quizz"
- [ ] Push code dengan git commands
- [ ] Verify di https://github.com/YOUR-USERNAME/maluku-quizz

### Hosting Service (Vercel/Railway/Render):
- [ ] Create account dengan GitHub Sign-in
- [ ] Import repository
- [ ] Set environment variables
- [ ] Link database (PlanetScale/Railway/Render)
- [ ] Deploy
- [ ] Test aplikasi online

---

## 🔑 Generate APP_KEY

```bash
php artisan key:generate --show
```

Simpan output (format: `base64:xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx`) ke hosting service.

---

## 🗄️ Database Setup

### Opsi 1: Local Database
Jika DB_HOST pakai IP local, database harus always running di computer Anda.
**Tidak recommended untuk production!**

### Opsi 2: PlanetScale (RECOMMENDED)
```bash
# Free MySQL database di cloud
# Cukup copy credentials ke .env
```

1. https://planetscale.com/sign-up
2. Create org & database
3. Copy MySQL credentials
4. Paste di hosting service environment variables

### Opsi 3: Railway Database
Railway otomatis setup MySQL/PostgreSQL untuk Anda. Easiest option!

---

## ⚡ Quick Deploy Commands

```bash
# Setup awal
git config user.name "Your Name"
git config user.email "your@email.com"
git add .
git commit -m "Initial commit"
git remote add origin https://github.com/USERNAME/maluku-quizz.git
git branch -M main
git push -u origin main

# Push updates (setelah ada perubahan)
git add .
git commit -m "Update description"
git push
```

---

## 🐛 Troubleshooting

### Error: "APP_KEY not set"
→ Tambahkan `APP_KEY` di environment variables hosting service

### Error: "Database connection failed"
→ Check DB credentials di environment variables
→ Ensure database service is running

### Error: "Composer/npm install failed"
→ Verify `composer.json` & `package.json` ada di root
→ Check build command di hosting service

### Aplikasi tapi error 500
→ Check logs di hosting dashboard
→ Verify `.env` variables lengkap
→ Run `php artisan migrate` di hosting (jika ada option)

---

## 📞 Support Links

- **Vercel Docs**: https://vercel.com/docs
- **Railway Docs**: https://docs.railway.app
- **Render Docs**: https://render.com/docs
- **PlanetScale Docs**: https://planetscale.com/docs
- **Laravel Deployment**: https://laravel.com/docs/deployment

---

## ✨ Next Steps

1. **Pilih 1 platform** (rekomendasi: Vercel atau Railway)
2. **Push ke GitHub** (ikuti Step 1)
3. **Deploy** (ikuti Step 2-3)
4. **Test aplikasi** di URL yang diberikan

**Total waktu**: ~30 menit setup pertama kali 🚀
