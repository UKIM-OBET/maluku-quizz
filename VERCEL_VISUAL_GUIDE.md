# 🎯 VERCEL DEPLOYMENT - Visual Step-by-Step

```
┌─────────────────────────────────────────────────────────────┐
│  MALUKU QUIZZ - VERCEL DEPLOYMENT WORKFLOW                   │
└─────────────────────────────────────────────────────────────┘

PHASE 1: LOCAL PREPARATION
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

Step 1a: Generate APP_KEY (Save untuk nanti!)
┌─────────────────────────────────────────┐
│ Command Terminal:                       │
│ $ cd c:\Users\user\MALUKUQUIZZ          │
│ $ php artisan key:generate --show       │
│                                         │
│ Output:                                 │
│ base64:xxxxxxxxxxxxxxxxxxxxxx           │
│                                         │
│ 💾 COPY & SIMPAN! (untuk Step 3)       │
└─────────────────────────────────────────┘


Step 1b: Verify Files Ada
┌─────────────────────────────────────────┐
│ ✅ vercel.json         (baru dibuat)     │
│ ✅ api/index.php       (baru dibuat)     │
│ ✅ .gitignore          (sudah ada)       │
│ ✅ composer.json       (sudah ada)       │
│ ✅ package.json        (sudah ada)       │
└─────────────────────────────────────────┘


PHASE 2: GITHUB SETUP
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

Step 2a: Configure Git (First time only)
┌─────────────────────────────────────────┐
│ $ git config user.name "Your Name"      │
│ $ git config user.email "you@email.com" │
└─────────────────────────────────────────┘


Step 2b: Add Files
┌─────────────────────────────────────────┐
│ $ git add .                             │
│ $ git status    (verify)                │
│ ✅ Should NOT show .env file            │
└─────────────────────────────────────────┘


Step 2c: Commit
┌─────────────────────────────────────────┐
│ $ git commit -m "Ready for Vercel"      │
└─────────────────────────────────────────┘


Step 2d: Create GitHub Repository
┌─────────────────────────────────────────┐
│ 1. Visit https://github.com/new         │
│ 2. Repository name: maluku-quizz        │
│ 3. Visibility: Public (untuk Vercel)    │
│ 4. Click "Create repository"            │
│                                         │
│ 📋 Copy URL dari GitHub:                │
│ https://github.com/YOU/maluku-quizz    │
└─────────────────────────────────────────┘


Step 2e: Push to GitHub
┌─────────────────────────────────────────┐
│ $ git remote add origin [GITHUB_URL]    │
│ $ git branch -M main                    │
│ $ git push -u origin main               │
│                                         │
│ ✅ Repository synced!                   │
└─────────────────────────────────────────┘


PHASE 3: VERCEL DEPLOYMENT
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

Step 3a: Sign In to Vercel
┌─────────────────────────────────────────┐
│ 1. Visit https://vercel.com             │
│ 2. Sign up → Continue with GitHub       │
│ 3. Authorize access                     │
└─────────────────────────────────────────┘


Step 3b: Create New Project
┌─────────────────────────────────────────┐
│ 1. Click "New Project"                  │
│ 2. Select "Import Git Repository"       │
│ 3. Search: maluku-quizz                 │
│ 4. Click "Import"                       │
└─────────────────────────────────────────┘


Step 3c: Configure Build Settings
┌─────────────────────────────────────────┐
│ Framework: Select "Other"               │
│                                         │
│ Build Command:                          │
│ composer install && npm install &&      │
│ npm run build:css                       │
│                                         │
│ Output Directory:                       │
│ public                                  │
└─────────────────────────────────────────┘


Step 3d: Add Environment Variables
┌─────────────────────────────────────────┐
│ Click "Environment Variables"           │
│ Add each variable:                      │
│                                         │
│ APP_NAME = MalukuQuizz                  │
│ APP_ENV = production                    │
│ APP_DEBUG = false                       │
│ APP_KEY = base64:xxxx (dari Step 1a!)   │
│ APP_URL = https://maluku-quizz.vercel.. │
│ CACHE_DRIVER = file                     │
│ SESSION_DRIVER = cookie                 │
│ QUEUE_CONNECTION = sync                 │
│ FILESYSTEM_DISK = public                │
│                                         │
│ DATABASE VARIABLES:                     │
│ DB_CONNECTION = mysql                   │
│ DB_HOST = your-host                     │
│ DB_PORT = 3306                          │
│ DB_DATABASE = malukuquizz               │
│ DB_USERNAME = user                      │
│ DB_PASSWORD = password                  │
└─────────────────────────────────────────┘


Step 3e: Deploy!
┌─────────────────────────────────────────┐
│ Click "Deploy"                          │
│ ⏳ Wait 3-5 minutes...                   │
│                                         │
│ ✅ Deployment Complete!                 │
│ 🎉 Visit: https://maluku-quizz.vercel.app
└─────────────────────────────────────────┘


PHASE 4: DATABASE SETUP
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

Step 4a: Choose Database Option
┌─────────────────────────────────────────┐
│ Option A: Local MySQL (Easy for testing)│
│  • Already have database locally        │
│  • Update Vercel env variables          │
│                                         │
│ Option B: Cloud Database (Recommended)  │
│  • PlanetScale (MySQL)                  │
│  • MongoDB Atlas                        │
│  • AWS RDS                              │
│                                         │
│ Recommended: PlanetScale                │
│ → Free tier available                   │
│ → MySQL compatible                      │
│ → Easy setup                            │
└─────────────────────────────────────────┘


Step 4b: Run Migrations
┌─────────────────────────────────────────┐
│ Option 1: Vercel CLI                    │
│ $ npm install -g vercel                 │
│ $ vercel env pull                       │
│ $ php artisan migrate --seed            │
│                                         │
│ Option 2: Manual (via Vercel Dashboard) │
│ → Go to Deployments → Logs              │
│ → Execute: php artisan migrate --seed   │
│                                         │
│ ✅ Database seeded dengan data!         │
└─────────────────────────────────────────┘


PHASE 5: TEST & LAUNCH
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

Step 5a: Access Application
┌─────────────────────────────────────────┐
│ URL: https://maluku-quizz.vercel.app    │
│                                         │
│ ✅ Works on Desktop                     │
│ ✅ Works on Mobile                      │
│ ✅ Works on Tablet                      │
│ ✅ Works anywhere (internet needed)     │
└─────────────────────────────────────────┘


Step 5b: Test Login
┌─────────────────────────────────────────┐
│ Guru Account:                           │
│ Email: guru@example.com                 │
│ Password: password                      │
│                                         │
│ Siswa Account:                          │
│ Email: murid@example.com                │
│ Password: password                      │
│                                         │
│ ✅ Both accounts working!               │
└─────────────────────────────────────────┘


PHASE 6: ONGOING DEPLOYMENT
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

Update Code & Auto-Deploy
┌─────────────────────────────────────────┐
│ 1. Edit files locally                   │
│ 2. $ git add .                          │
│ 3. $ git commit -m "Your message"       │
│ 4. $ git push                           │
│ 5. ✨ Vercel auto-deploys!              │
│                                         │
│ No manual redeploy needed!              │
└─────────────────────────────────────────┘


FINAL CHECKLIST
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

✅ GitHub repository created & pushed
✅ Vercel project imported
✅ Build configuration set
✅ Environment variables added
✅ APP_KEY configured
✅ Database connected
✅ Migrations executed
✅ Application accessible
✅ Login working
✅ Auto-deploy enabled

🎉 DEPLOYMENT COMPLETE!
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

Your application is now live at:
🌐 https://maluku-quizz.vercel.app

Share this URL dengan guru & siswa untuk mulai belajar!
```

---

## 📋 Database Options Details

### **Option A: PlanetScale (Recommended Cloud)**
```
1. Visit https://planetscale.com
2. Sign up free
3. Create new database: malukuquizz
4. Get connection string
5. Add to Vercel env:
   DB_HOST: xxxxx.mysql.planetscale.com
   DB_USERNAME: xxxxx
   DB_PASSWORD: pscale_pw_xxxxx
   DB_DATABASE: malukuquizz
```

### **Option B: Local MySQL Server**
```
1. Already have MySQL running on computer
2. Create database: malukuquizz
3. Add to Vercel env:
   DB_HOST: your-computer-ip (cek ipconfig)
   DB_USERNAME: root
   DB_PASSWORD: (your password)
   DB_DATABASE: malukuquizz
   
⚠️ Note: Server harus always online
```

### **Option C: AWS RDS**
```
1. AWS Console → RDS
2. Create MySQL instance
3. Get endpoint
4. Add to Vercel env accordingly
💰 Bayar per usage
```

---

## 🆘 Quick Troubleshooting

```
❌ Build Failed
→ Check Node.js version in Vercel logs
→ Check composer.json
→ Run locally: npm run build:css

❌ Cannot connect to database
→ Verify DB credentials in Vercel env
→ Check IP whitelist (if cloud DB)
→ Test connection locally first

❌ CSS/JS not showing
→ Check public folder permissions
→ Clear browser cache
→ Check APP_URL in .env

❌ 500 Error
→ Check Vercel logs
→ Verify storage folder writable
→ Check APP_KEY format
```

---

## 📞 Next Steps

1. Follow all steps di atas
2. Test aplikasi thoroughly
3. Get feedback dari guru
4. Make improvements
5. Push changes (auto-deploy!)
6. Scale jika diperlukan

**Selamat deploy! 🚀**
