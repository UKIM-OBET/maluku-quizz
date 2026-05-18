# 🔧 Panduan Terperinci: GitHub → Vercel → PlanetScale

---

## 📌 BAGIAN 1: Setup GitHub Repo Pertama Kali

### Step 1: Install Git (jika belum ada)

**Windows**:
1. Download dari: https://git-scm.com/download/win
2. Install (klik Next → Next → Finish)
3. Verifikasi:
   ```powershell
   git --version
   ```

---

### Step 2: Buat Account GitHub

1. Buka https://github.com
2. Klik "Sign up"
3. Isi email, password, username
4. Verifikasi email
5. ✅ Account siap!

---

### Step 3: Setup Git di Local Computer

**Buka PowerShell (Windows):**

```powershell
# Configure nama & email (ganti dengan data Anda)
git config --global user.name "Nama Anda"
git config --global user.email "email@gmail.com"

# Verifikasi
git config --global user.name
git config --global user.email
```

**Output harusnya:**
```
Nama Anda
email@gmail.com
```

---

### Step 4: Persiapan Project Local

**Di PowerShell, masuk ke folder project:**

```powershell
cd c:\Users\user\MALUKUQUIZZ

# Pastikan sudah punya .gitignore (untuk exclude vendor, node_modules, .env)
# Jika belum, buat file .gitignore
```

**Buat/Update .gitignore** (jika belum ada):

Buat file baru di root project bernama `.gitignore` dengan isi:
```
/node_modules
/vendor
/bootstrap/cache/
/storage/framework/views/
.env
.env.local
*.log
.DS_Store
```

---

### Step 5: Initialize Git di Local

**Di PowerShell:**

```powershell
cd c:\Users\user\MALUKUQUIZZ

# Initialize git repository
git init

# Verify
git status
```

**Output harusnya:**
```
On branch master

No commits yet

Untracked files:
  (use "git add <file>..." to include in what will be committed)
        .gitignore
        composer.json
        ...
```

---

### Step 6: Create Repository di GitHub

1. Buka https://github.com/new
2. **Repository name**: `maluku-quizz`
3. **Description**: `Platform Quiz Budaya Maluku`
4. **Visibility**: **Public** ✅ (agar bisa diakses orang lain)
5. ❌ **Jangan** centang "Initialize this repository with..."
6. Klik **"Create repository"**

**Akan melihat halaman dengan instruksi:**
```
git remote add origin https://github.com/YOUR-USERNAME/maluku-quizz.git
git branch -M main
git push -u origin main
```

**Salin link repository untuk Step 8**

---

### Step 7: Add Files ke Git

**Di PowerShell:**

```powershell
cd c:\Users\user\MALUKUQUIZZ

# Add semua files
git add .

# Verify (lihat files yang akan di-commit)
git status
```

**Harusnya melihat:**
```
On branch master

No commits yet

Changes to be committed:
  new file:   .gitignore
  new file:   composer.json
  new file:   package.json
  ...
```

---

### Step 8: First Commit

**Di PowerShell:**

```powershell
git commit -m "Initial commit - Maluku Quizz Platform"
```

**Output:**
```
[master (root-commit) abc1234] Initial commit - Maluku Quizz Platform
 XX files changed, XXXX insertions(+)
 create mode 100644 .gitignore
 ...
```

---

### Step 9: Connect ke GitHub & Push

**Di PowerShell (ganti YOUR-USERNAME):**

```powershell
# Tambahkan remote repository
git remote add origin https://github.com/YOUR-USERNAME/maluku-quizz.git

# Rename branch master → main
git branch -M main

# Push ke GitHub
git push -u origin main
```

**Akan diminta login GitHub:**
- Klik link yang muncul
- Authorize di browser
- Back ke terminal

**Output:**
```
Enumerating objects: 45, done.
Counting objects: 100% (45/45), done.
Delta compression using up to 8 threads
Compressing objects: 100% (40/40), done.
Writing objects: 100% (45/45), 245.89 KiB, done.
...
To https://github.com/YOUR-USERNAME/maluku-quizz.git
 * [new branch]      main -> main
Branch 'main' set up to track remote branch 'main' from 'origin'.
```

✅ **GitHub repo ready!**

---

### Step 10: Verify di GitHub

1. Buka https://github.com/YOUR-USERNAME/maluku-quizz
2. Harusnya melihat semua files
3. Branch: `main`

---

## 📌 UPDATE SELANJUTNYA (Setiap Ada Perubahan)

```powershell
# Masuk folder project
cd c:\Users\user\MALUKUQUIZZ

# Lihat file yang berubah
git status

# Add changes
git add .

# Commit dengan message deskriptif
git commit -m "Deskripsi perubahan"

# Push ke GitHub
git push
```

---

---

## 🚀 BAGIAN 2: Deploy ke Vercel Step-by-Step

### Prerequisites
- ✅ GitHub repo sudah public
- ✅ GitHub account
- ✅ Sudah push code ke main branch

---

### Step 1: Create Vercel Account

1. Buka https://vercel.com
2. Klik "Sign up"
3. Pilih **"Sign up with GitHub"**
4. Click "Authorize Vercel"
5. Login GitHub (jika perlu)
6. ✅ Account created!

---

### Step 2: Create New Project di Vercel

1. Setelah login, akan ke dashboard
2. Klik **"Add New..."** → **"Project"**
3. Pilih **"Continue with GitHub"**
4. Search: `maluku-quizz`
5. Klik **"Import"**

---

### Step 3: Configure Build Settings

**Di halaman "Configure Project"**, setting ini:

**Framework**: Laravel
**Root Directory**: `.` (default, biarkan kosong)

**Build Command**:
```
composer install && npm install && npm run build:css
```

**Output Directory**:
```
public
```

**Install Command**:
```
composer install && npm install
```

Klik **"Deploy"** (belum, ada step lagi!)

---

### Step 4: Set Environment Variables (PENTING!)

**SEBELUM klik "Deploy", buka Settings:**

Jika sudah di halaman Configure Project:
1. Scroll ke bawah → **"Environment Variables"**
2. Tambahkan variables ini (lihat step berikutnya)

---

### Step 4a: Get APP_KEY

**Di PowerShell (local):**

```powershell
cd c:\Users\user\MALUKUQUIZZ
php artisan key:generate --show
```

**Output:** (sesuatu seperti)
```
base64:rUqKDEzYrT5qxNvE/J+1nQ==
```

**COPY string ini** (termasuk `base64:`)

---

### Step 4b: Add Environment Variables di Vercel

Di Vercel dashboard, di bagian **"Environment Variables"**, tambahkan:

| Key | Value |
|-----|-------|
| `APP_NAME` | `MalukuQuizz` |
| `APP_ENV` | `production` |
| `APP_DEBUG` | `false` |
| `APP_KEY` | `base64:rUqKDEzYrT5qxNvE/J+1nQ==` (dari Step 4a) |
| `APP_URL` | `https://maluku-quizz.vercel.app` |
| `CACHE_DRIVER` | `file` |
| `SESSION_DRIVER` | `cookie` |
| `QUEUE_CONNECTION` | `sync` |
| `FILESYSTEM_DISK` | `public` |

**Untuk database** (lihat Bagian 3: PlanetScale):
| Key | Value |
|-----|-------|
| `DB_CONNECTION` | `mysql` |
| `DB_HOST` | (dari PlanetScale) |
| `DB_PORT` | `3306` |
| `DB_DATABASE` | (dari PlanetScale) |
| `DB_USERNAME` | (dari PlanetScale) |
| `DB_PASSWORD` | (dari PlanetScale) |

---

### Step 5: Deploy!

1. Scroll ke bawah
2. Klik **"Deploy"**
3. ⏳ Tunggu 2-5 menit...

**Lihat progress:**
- `Building` - Sedang compile
- `Deploying` - Sedang upload
- ✅ `Production` - Selesai!

---

### Step 6: Access Aplikasi

**URL**: `https://maluku-quizz.vercel.app`

atau

Klik link yang ditampilkan di Vercel dashboard

---

### Step 7: Automatic Redeploy Setup

Setiap kali push ke GitHub:

```powershell
git add .
git commit -m "Update description"
git push
```

→ Vercel otomatis rebuild & deploy! (1-2 menit)

---

### Step 8: Monitor Deployment

Di Vercel dashboard:
1. Klik project "maluku-quizz"
2. Buka tab **"Deployments"**
3. Lihat history deploy
4. Klik untuk lihat logs

---

---

## 💾 BAGIAN 3: Setup Database PlanetScale

### Kenapa PlanetScale?
- ✅ MySQL cloud, gratis untuk development
- ✅ Easy backup & scale
- ✅ Works perfectly dengan Vercel
- ✅ Tidak perlu setup di local

---

### Step 1: Create PlanetScale Account

1. Buka https://planetscale.com
2. Klik **"Sign up"**
3. Pilih **"Sign up with GitHub"** (atau email)
4. Authorize jika perlu
5. ✅ Account created!

---

### Step 2: Create Organization

1. Dashboard → **"Create Organization"**
2. **Organization Name**: `maluku-quizz`
3. Click **"Create"**

---

### Step 3: Create Database

1. Di Organization, klik **"Create database"**
2. **Database name**: `malukuquizz`
3. **Region**: pilih yang paling dekat dengan Anda (misal: Singapore)
4. Klik **"Create database"**

⏳ Tunggu ~1 menit...

---

### Step 4: Get Connection String

1. Buka database `malukuquizz`
2. Tab **"Connect"**
3. Dropdown → Pilih **"PHP"** (atau bisa juga "General")

**Akan melihat connection string:**

```
Host: xxxxx.mysql.planetscale.com
Port: 3306
Database: malukuquizz
Username: xxxxx
Password: pscale_pw_xxxxxxxxxxxxx
```

---

### Step 5: Copy Credentials

Simpan 5 value di atas:
- **DB_HOST**: `xxxxx.mysql.planetscale.com`
- **DB_PORT**: `3306`
- **DB_DATABASE**: `malukuquizz`
- **DB_USERNAME**: `xxxxx`
- **DB_PASSWORD**: `pscale_pw_xxxxxxxxxxxxx`

---

### Step 6: Add ke .env Local (untuk testing)

**Edit file `.env` di project root:**

```env
DB_CONNECTION=mysql
DB_HOST=xxxxx.mysql.planetscale.com
DB_PORT=3306
DB_DATABASE=malukuquizz
DB_USERNAME=xxxxx
DB_PASSWORD=pscale_pw_xxxxxxxxxxxxx
```

---

### Step 7: Test Connection Local

**Di PowerShell:**

```powershell
cd c:\Users\user\MALUKUQUIZZ

# Test connection
php artisan tinker
```

**Di Tinker prompt:**
```php
DB::connection()->getPdo();
```

Jika berhasil, harusnya tidak error. Ketik `exit` untuk keluar.

---

### Step 8: Run Migrations

**Di PowerShell:**

```powershell
# Clear cache first
php artisan cache:clear
php artisan config:clear

# Run migrations
php artisan migrate
```

**Output:**
```
Migration table created successfully.
Migrating: 2026_04_14_000001_create_users_table
Migrated: 2026_04_14_000001_create_users_table (xxx ms)
...
```

✅ **Database ready!**

---

### Step 9: Add ke Vercel Environment

1. Buka Vercel dashboard
2. Project "maluku-quizz" → **"Settings"** → **"Environment Variables"**
3. Tambahkan:

| Key | Value |
|-----|-------|
| `DB_CONNECTION` | `mysql` |
| `DB_HOST` | `xxxxx.mysql.planetscale.com` |
| `DB_PORT` | `3306` |
| `DB_DATABASE` | `malukuquizz` |
| `DB_USERNAME` | `xxxxx` |
| `DB_PASSWORD` | `pscale_pw_xxxxxxxxxxxxx` |

4. Klik **"Save"**

---

### Step 10: Trigger Redeployment

Supaya Vercel run migration dengan env baru:

```powershell
git add .
git commit -m "Add database migration"
git push
```

Atau di Vercel: Deployments → klik "Redeploy" on latest

⏳ Tunggu deploy selesai (~2 menit)

---

### Step 11: Verify Database Online

**Di PlanetScale dashboard:**
1. Database `malukuquizz`
2. Tab **"Branches"** → klik `main`
3. Tab **"Query"** → buka query editor
4. Run:
   ```sql
   SELECT COUNT(*) FROM users;
   ```

Harusnya return `0` atau lebih (tergantung seeders)

---

---

## ✅ VERIFIKASI FINAL

### Local:
```powershell
# Test app local
php artisan serve
# Buka http://localhost:8000
# Verifikasi bisa access semua fitur
```

### GitHub:
```powershell
git status
# Harusnya "nothing to commit"

# View repository
# https://github.com/YOUR-USERNAME/maluku-quizz
```

### Vercel:
- ✅ Deployment successful (green checkmark)
- ✅ URL accessible: https://maluku-quizz.vercel.app
- ✅ App bisa di-access online

### PlanetScale:
- ✅ Database connected
- ✅ Tables ada (users, quizzes, etc.)
- ✅ Data bisa read/write

---

---

## 🆘 TROUBLESHOOTING

### Error: "npm: command not found"
```powershell
# Install Node.js dari: https://nodejs.org
# Reboot PowerShell setelah install
node --version
npm --version
```

### Error: "composer: command not found"
```powershell
# Install Composer dari: https://getcomposer.org
composer --version
```

### Error di Vercel: "Build failed"
1. Buka Vercel → Deployments → klik deployment yang error
2. Lihat log untuk error message
3. Fix di local, push ke GitHub
4. Vercel otomatis redeploy

### Error: "Database connection refused"
1. Verify credentials di PlanetScale benar
2. Verify credentials sudah di Vercel env vars
3. Check firewall (PlanetScale biasanya allow all by default)

### Error: "APP_KEY not set"
1. Pastikan APP_KEY ada di Vercel env vars
2. Format: `base64:xxxxxxxxxxxxx`
3. Trigger redeploy

---

## 📞 Quick Links

- **GitHub**: https://github.com
- **Vercel**: https://vercel.com
- **PlanetScale**: https://planetscale.com
- **Git Download**: https://git-scm.com
- **Node.js Download**: https://nodejs.org
- **Composer**: https://getcomposer.org

---

## 🎯 Timeline (Pertama Kali)

| Task | Waktu |
|------|-------|
| Install Git & Node.js | 10 menit |
| Setup GitHub repo | 5 menit |
| Create Vercel account | 2 menit |
| Deploy ke Vercel | 5 menit |
| Create PlanetScale account | 3 menit |
| Setup database | 5 menit |
| Add env vars | 3 menit |
| **Total** | **~33 menit** |

---

## 🚀 Setelah Sudah Online

### Update code (setiap ada perubahan):
```powershell
git add .
git commit -m "Description"
git push
```

### Monitor aplikasi:
- Vercel dashboard: lihat logs
- PlanetScale: lihat data & performance

### Backup data:
PlanetScale ada auto-backup. Jangan khawatir!

---

**Good luck! 🎉**
