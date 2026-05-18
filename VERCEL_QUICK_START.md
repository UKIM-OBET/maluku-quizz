# 🚀 VERCEL DEPLOYMENT - Quick Commands

Langsung jalankan command ini untuk deploy ke Vercel:

---

## ✅ Step 1: Generate APP_KEY (Simpan untuk nanti)

```bash
cd c:\Users\user\MALUKUQUIZZ
php artisan key:generate --show
```

**Copy output** (sesuatu seperti: `base64:xxxxxxxxxxxxxxxxxxxx`)

---

## ✅ Step 2: Push ke GitHub

```bash
# Setup git (lakukan sekali)
git config user.name "Your Name"
git config user.email "your.email@gmail.com"

# Add files
git add .

# Commit
git commit -m "Ready for Vercel deployment"

# Create GitHub repo di https://github.com/new
# Nama repo: maluku-quizz
# Visibility: Public

# Push (ganti YOUR-USERNAME)
git remote add origin https://github.com/YOUR-USERNAME/maluku-quizz.git
git branch -M main
git push -u origin main
```

✅ **Repository selesai!**

---

## ✅ Step 3: Deploy di Vercel

1. **Buka** https://vercel.com
2. **Sign up** dengan GitHub
3. **Click** "New Project"
4. **Select** "maluku-quizz" repository
5. **Click** "Import"

### Configure:
```
Build Command: 
composer install && npm install && npm run build:css

Output Directory: 
public
```

### Environment Variables - Tambahkan ini:

```
APP_NAME = MalukuQuizz
APP_ENV = production
APP_DEBUG = false
APP_KEY = base64:xxxxx (PASTE dari Step 1)
APP_URL = https://maluku-quizz.vercel.app

CACHE_DRIVER = file
SESSION_DRIVER = cookie
QUEUE_CONNECTION = sync
FILESYSTEM_DISK = public
```

**Database (pilih satu):**

**Option A - Local (untuk testing):**
```
DB_CONNECTION = mysql
DB_HOST = your-computer-ip (cek ipconfig)
DB_PORT = 3306
DB_DATABASE = malukuquizz
DB_USERNAME = root
DB_PASSWORD = 
```

**Option B - Cloud (Recommended):**
```
DB_CONNECTION = mysql
DB_HOST = xxxxx.mysql.planetscale.com
DB_DATABASE = malukuquizz
DB_USERNAME = xxxxx
DB_PASSWORD = pscale_pw_xxxxx
```

6. **Click** "Deploy"
7. ⏳ Tunggu ~3-5 menit
8. ✅ **Selesai!** Access di https://maluku-quizz.vercel.app

---

## ✅ Step 4: Database Migrations

```bash
# Option 1 - Vercel CLI (paling mudah)
npm install -g vercel
vercel env pull
php artisan migrate --seed

# Option 2 - Manual via Vercel Dashboard
# Go to: Deployments → [latest] → Logs
# Execute: php artisan migrate --seed
```

---

## ✅ Step 5: Test & Share

```
Login sebagai:
- Guru: guru@example.com
- Siswa: murid@example.com

Share URL: https://maluku-quizz.vercel.app
```

---

## 🔄 Update Code (setelah deploy)

```bash
# Edit files lokal
# Commit & push
git add .
git commit -m "Deskripsi perubahan"
git push

# Vercel auto-deploy! ✨
```

---

## 📝 Troubleshooting

### Build gagal?
→ Cek build logs di Vercel Dashboard

### Database error?
→ Pastikan DB host/credentials benar
→ Jalankan migrations

### CSS tidak load?
→ Pastikan: npm run build:css sukses
→ Clear browser cache (Ctrl+Shift+Del)

---

## 🆘 Bantuan

**Jika ada error:**
1. Cek Vercel Dashboard → Deployments → Logs
2. Search error message di internet
3. Verify .env variables
4. Test lokal: `php artisan serve`

---

## ✨ Hasil Akhir

✅ Website live di Vercel
✅ Auto-deploy dari GitHub
✅ Accessible dari mana saja
✅ Database terhubung
✅ Siap digunakan di sekolah!

🎉 **Selamat deploy!**
