# 🚀 Deployment Guide: Vercel

Panduan lengkap untuk deploy Maluku Quizz ke Vercel dari GitHub.

---

## 📋 Prerequisites

Pastikan sudah ada:
- ✅ GitHub account (https://github.com)
- ✅ Vercel account (https://vercel.com) - Gratis
- ✅ Git installed
- ✅ Project sudah siap

---

## 🔧 Step 1: Prepare Project (Local)

### 1.1 Check Project Structure
```bash
cd c:\Users\user\MALUKUQUIZZ

# Pastikan file ini ada:
ls vercel.json          # ✅ Ada (sudah dibuat)
ls api/index.php        # ✅ Ada (sudah dibuat)
ls .gitignore           # ✅ Ada
ls composer.json        # ✅ Ada
ls package.json         # ✅ Ada (untuk CSS build)
```

### 1.2 Verify .gitignore
Pastikan `./.gitignore` include:
```
/.env              # ✅ PENTING - jangan push credentials
/vendor            # Dependencies di-install di Vercel
/node_modules      # Install ulang di Vercel
/storage/logs      # Log files
/storage/cache     # Cache files
```

### 1.3 Create .env.example (if not complete)
File `./.env.example` should look like:
```env
APP_NAME=MalukuQuizz
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost:3000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=malukuquizz
DB_USERNAME=root
DB_PASSWORD=

CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_CONNECTION=sync
FILESYSTEM_DISK=public
```

---

## 🐙 Step 2: Push ke GitHub

### 2.1 Initialize Git Repository
```bash
cd c:\Users\user\MALUKUQUIZZ

# Check if already initialized
git status

# If not, initialize:
git init
git config user.name "Your Name"
git config user.email "your@email.com"
```

### 2.2 Add All Files
```bash
# Add all files
git add .

# Verify (check status)
git status

# Should NOT show .env file (karena di .gitignore)
```

### 2.3 Create Initial Commit
```bash
git commit -m "Initial commit: Maluku Quizz v1.0 - Ready for Vercel deployment"
```

### 2.4 Create GitHub Repository

1. Go to https://github.com/new
2. Repository name: `maluku-quizz`
3. Description: "Website gamifikasi pengenalan budaya Maluku"
4. Visibility: `Public` (untuk Vercel gratis) atau `Private`
5. Click "Create repository"

### 2.5 Push to GitHub
```bash
# Copy URL dari GitHub (HTTPS atau SSH)
# Format: https://github.com/YOUR-USERNAME/maluku-quizz.git

# Add remote
git remote add origin https://github.com/YOUR-USERNAME/maluku-quizz.git

# Change branch name to main
git branch -M main

# Push
git push -u origin main

# Verify
git status
# Should show: "On branch main, Your branch is up to date with 'origin/main'."
```

---

## 🌐 Step 3: Deploy di Vercel

### 3.1 Sign Up/Login ke Vercel
1. Go to https://vercel.com
2. Click "Sign up" (if new)
3. Choose "Continue with GitHub"
4. Authorize Vercel to access your GitHub

### 3.2 Create New Project
1. Click "New Project" atau "Add New..."
2. Select "Import Git Repository"
3. Search: `maluku-quizz`
4. Click "Import"

### 3.3 Configure Project

**Framework:** Select "Other"

**Build Settings:**
```
Build Command: composer install && npm install && npm run build:css
Output Directory: public
Install Command: composer install && npm install
```

**Environment Variables:**

Click "Add Environment Variable" dan tambahkan:

```
APP_NAME = MalukuQuizz
APP_ENV = production
APP_DEBUG = false
APP_KEY = base64:YOUR_KEY_HERE
APP_URL = https://your-app.vercel.app

CACHE_DRIVER = file
SESSION_DRIVER = cookie
QUEUE_CONNECTION = sync
FILESYSTEM_DISK = public
```

⚠️ **IMPORTANT untuk APP_KEY:**
```bash
# Generate di local terlebih dahulu:
php artisan key:generate --show

# Copy output (sesuatu seperti: base64:xxxxxxxxxxxxx)
# Paste di Vercel sebagai APP_KEY value
```

### 3.4 Deploy!
1. Click "Deploy"
2. Tunggu hingga deployment selesai
3. Vercel akan memberikan URL: `https://maluku-quizz.vercel.app`

---

## 🗄️ Step 4: Database Setup (Important!)

Vercel **tidak menyediakan database**. Kita perlu database eksternal.

### Option A: MySQL Database di Hostingspace Lokal (Recommended untuk dev)
```bash
# Buat database lokal
mysql> CREATE DATABASE malukuquizz;
mysql> CREATE USER 'maluku_user'@'%' IDENTIFIED BY 'strong_password';
mysql> GRANT ALL PRIVILEGES ON malukuquizz.* TO 'maluku_user'@'%';
mysql> FLUSH PRIVILEGES;

# Update .env di Vercel:
DB_HOST = your-server-ip-or-domain
DB_DATABASE = malukuquizz
DB_USERNAME = maluku_user
DB_PASSWORD = strong_password
```

### Option B: Cloud Database (Recommended untuk production)

#### **PlanetScale** (MySQL compatible)
```
1. https://planetscale.com → Sign up
2. Create database
3. Copy connection string
4. Add ke Vercel environment:
   DB_HOST = xxxxx.mysql.planetscale.com
   DB_USERNAME = xxxxx
   DB_PASSWORD = pscale_pw_xxxxx
   DB_DATABASE = malukuquizz
```

#### **MongoDB Atlas** (jika mau pakai MongoDB)
```
1. https://www.mongodb.com/cloud/atlas → Sign up
2. Create cluster
3. Add IP whitelist: 0.0.0.0/0
4. Get connection string
5. Add ke Vercel environment
```

### 4.1 Run Migrations di Vercel
```bash
# Option 1: Vercel CLI
npm install -g vercel
vercel env pull                    # Pull env variables
php artisan migrate --seed         # Run migrations

# Option 2: Direct via Vercel Dashboard
# Go to Deployment → Function Logs
# Execute: php artisan migrate --seed
```

---

## ✅ Verification Checklist

- [ ] GitHub repository created & push successful
- [ ] Vercel project imported
- [ ] Build command working (no errors)
- [ ] Environment variables set
- [ ] APP_KEY configured
- [ ] Database connected
- [ ] Migrations ran successfully
- [ ] App accessible at https://maluku-quizz.vercel.app

---

## 🔄 Step 5: Auto-Deploy Setup

Setelah push ke GitHub, Vercel otomatis deploy ulang:

```bash
# Edit local file
# Commit changes
git add .
git commit -m "Update feature"

# Push ke GitHub
git push

# Vercel otomatis deploy! ✨
```

---

## 🌍 Custom Domain (Optional)

1. Di Vercel Dashboard → Settings → Domains
2. Add custom domain: `malukuquizz.com`
3. Update DNS records sesuai instruksi Vercel
4. Wait 24-48 hours untuk DNS propagation

---

## 🐛 Troubleshooting

### "Build failed"
```
Cek:
1. Node version compatibility
2. Composer dependencies
3. CSS build (npm run build:css)
4. PHP version (8.1+ required)
```

### "Database connection error"
```
Cek:
1. DB_HOST correct
2. DB_USERNAME, DB_PASSWORD correct
3. IP whitelisted (jika cloud DB)
4. Database exists
```

### "500 Internal Server Error"
```
Cek:
1. APP_KEY set correctly
2. Storage folder writable
3. Logs di Vercel Dashboard
4. Local test: php artisan serve
```

### CSS/JS not loaded
```
Cek:
1. npm run build:css ran
2. Public folder accessible
3. APP_URL correct di .env
```

---

## 📊 Monitoring & Logs

### View Logs di Vercel
1. Dashboard → Deployments
2. Click deployment → Logs
3. Check build & runtime errors

### View Application Logs
```bash
# Enable logging di .env:
LOG_CHANNEL=stack
LOG_LEVEL=debug

# View logs di storage/logs/
# Download from Vercel SFTP
```

---

## 🔐 Security Checklist

- [ ] `.env` NOT pushed to GitHub
- [ ] `APP_DEBUG = false` di production
- [ ] Strong `DB_PASSWORD` set
- [ ] IP whitelist configured (cloud DB)
- [ ] HTTPS enabled (Vercel auto)
- [ ] Environment variables NOT in code

---

## 📱 Test Access

```
✅ Desktop: https://maluku-quizz.vercel.app
✅ Mobile: https://maluku-quizz.vercel.app
✅ Tablet: https://maluku-quizz.vercel.app

Login:
- Guru: guru@example.com / password
- Siswa: murid@example.com / password
```

---

## 💰 Vercel Pricing

- **Hobby Plan**: $0/month (Free)
  - ✅ Perfect untuk development/testing
  - ✅ Unlimited deployments
  - ✅ Serverless functions free tier
  - ⚠️ Limited performance

- **Pro Plan**: $20/month
  - ✅ Better performance
  - ✅ Priority support
  - ✅ Analytics

---

## 🚀 Final Steps

1. ✅ Project ready di Vercel
2. ✅ Auto-deploy pada setiap git push
3. ✅ Database configured
4. ✅ Live di https://maluku-quizz.vercel.app
5. ✅ Accessible dari mana saja!

---

## 📞 Support & Resources

- **Vercel Docs**: https://vercel.com/docs
- **Laravel Deployment**: https://laravel.com/docs/deployment
- **Vercel CLI**: https://vercel.com/cli

---

**Next Steps:**
1. Follow Steps 1-5 di atas
2. Test aplikasi
3. Share URL dengan guru/siswa
4. Monitor logs di Vercel Dashboard
5. Update code & push untuk auto-deploy

Selamat deploy! 🎉
