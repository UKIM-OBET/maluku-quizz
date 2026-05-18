# ✅ VERCEL DEPLOYMENT CHECKLIST

Print atau refer ke guide ini saat deployment!

---

## 📝 PRE-DEPLOYMENT (Local Setup)

### Files
- [ ] `vercel.json` ✅ (sudah ada)
- [ ] `api/index.php` ✅ (sudah ada)  
- [ ] `.gitignore` ✅ (sudah ada, include .env)
- [ ] `composer.json` ✅ (sudah ada)
- [ ] `package.json` ✅ (sudah ada)

### Generate APP_KEY
```bash
cd c:\Users\user\MALUKUQUIZZ
php artisan key:generate --show
```
- [ ] APP_KEY generated: `base64:__________________`
- [ ] APP_KEY copied & saved for Step 3

---

## 🐙 GITHUB SETUP

### Local Git Setup
```bash
git config user.name "Your Name"
git config user.email "you@email.com"
```
- [ ] Git configured

### Commit & Push
```bash
git add .
git status  # verify .env NOT shown
git commit -m "Ready for Vercel"
```
- [ ] Files committed

### Create GitHub Repository
- [ ] Visit https://github.com/new
- [ ] Repo name: `maluku-quizz`
- [ ] Visibility: `Public`
- [ ] Repository created
- [ ] GitHub URL copied: `https://github.com/_______/maluku-quizz`

### Push to GitHub
```bash
git remote add origin [GITHUB_URL]
git branch -M main
git push -u origin main
```
- [ ] Repository pushed to GitHub
- [ ] Can see files in GitHub.com

---

## 🌐 VERCEL DEPLOYMENT

### 1. Sign Up
- [ ] Visit https://vercel.com
- [ ] Sign up → Continue with GitHub
- [ ] GitHub authorization complete
- [ ] Vercel account ready

### 2. Create Project
- [ ] Click "New Project"
- [ ] Select "Import Git Repository"
- [ ] Search & select "maluku-quizz"
- [ ] Click "Import"

### 3. Build Settings
```
Build Command: 
composer install && npm install && npm run build:css

Output Directory: 
public
```
- [ ] Framework: "Other" selected
- [ ] Build Command set
- [ ] Output Directory set

### 4. Environment Variables (add each one)

```
□ APP_NAME = MalukuQuizz
□ APP_ENV = production
□ APP_DEBUG = false
□ APP_KEY = base64:__________________ (dari Step 1)
□ APP_URL = https://maluku-quizz.vercel.app
□ CACHE_DRIVER = file
□ SESSION_DRIVER = cookie
□ QUEUE_CONNECTION = sync
□ FILESYSTEM_DISK = public
```

### 5. Database Variables (pilih satu option)

**Option A: PlanetScale (Cloud - Recommended)**
```
□ DB_CONNECTION = mysql
□ DB_HOST = xxxxx.mysql.planetscale.com
□ DB_PORT = 3306
□ DB_DATABASE = malukuquizz
□ DB_USERNAME = xxxxx
□ DB_PASSWORD = pscale_pw_xxxxx
```

**Option B: Local MySQL**
```
□ DB_CONNECTION = mysql
□ DB_HOST = 192.168.x.x (your IP)
□ DB_PORT = 3306
□ DB_DATABASE = malukuquizz
□ DB_USERNAME = root
□ DB_PASSWORD = (your password)
```

### 6. Deploy
- [ ] All variables added
- [ ] Click "Deploy"
- [ ] ⏳ Wait 3-5 minutes...
- [ ] Deployment successful ✅

### 7. Get Deployment URL
- [ ] URL provided by Vercel: `https://_____.vercel.app`
- [ ] Visit URL (should work!)

---

## 🗄️ DATABASE SETUP

### Create Database (if using local MySQL)
```sql
mysql> CREATE DATABASE malukuquizz;
mysql> CREATE USER 'maluku'@'%' IDENTIFIED BY 'password';
mysql> GRANT ALL PRIVILEGES ON malukuquizz.* TO 'maluku'@'%';
mysql> FLUSH PRIVILEGES;
```
- [ ] Database created
- [ ] User created
- [ ] Permissions granted

### Or Setup PlanetScale
- [ ] Visit https://planetscale.com
- [ ] Sign up
- [ ] Create database
- [ ] Get connection credentials
- [ ] Add to Vercel env variables

### Run Migrations
```bash
# Option 1: Via Vercel CLI
npm install -g vercel
vercel env pull
php artisan migrate --seed

# Option 2: Via Vercel Dashboard
# Go to Deployments → Logs → Run command
```
- [ ] php artisan migrate ran
- [ ] php artisan seed ran
- [ ] Default accounts created

---

## ✅ TESTING

### Test URL
- [ ] Visit: https://maluku-quizz.vercel.app
- [ ] Page loads (no error)
- [ ] CSS/animations working
- [ ] Responsive on mobile

### Test Login - Guru
```
Email: guru@example.com
Password: password
```
- [ ] Guru login successful
- [ ] Dashboard loads
- [ ] Can create quiz

### Test Login - Siswa
```
Email: murid@example.com
Password: password
```
- [ ] Siswa login successful
- [ ] Can see quizzes
- [ ] Can take quiz
- [ ] Can see leaderboard

### Test Features
- [ ] Quiz creation (guru)
- [ ] Quiz taking (siswa)
- [ ] Points calculation
- [ ] Leaderboard update
- [ ] Progress tracking
- [ ] Animations working

---

## 📱 CROSS-DEVICE TEST

- [ ] Desktop Chrome ✅
- [ ] Desktop Firefox ✅
- [ ] Mobile Chrome ✅
- [ ] Mobile Safari ✅
- [ ] Tablet (any browser) ✅
- [ ] Responsive design ✅

---

## 🔐 SECURITY VERIFICATION

- [ ] .env NOT pushed to GitHub
- [ ] APP_DEBUG = false (production)
- [ ] Strong database password set
- [ ] HTTPS enabled (Vercel auto)
- [ ] Environment variables NOT in code
- [ ] Credentials NOT visible in logs

---

## 📊 MONITORING

### Vercel Dashboard
- [ ] Visit https://vercel.com/dashboard
- [ ] Can see deployment status
- [ ] Can view logs
- [ ] Can see analytics

### Check Logs
- [ ] Deployments tab
- [ ] Click latest deployment
- [ ] No errors in build log
- [ ] No errors in runtime log

---

## 🔄 AUTO-DEPLOY SETUP

- [ ] GitHub repository connected
- [ ] Auto-deploy on push enabled
- [ ] Test: Make small change locally
- [ ] Git push
- [ ] [ ] Vercel auto-deploys

---

## 📞 TROUBLESHOOTING

### Build Failed?
```
□ Check Vercel logs for error
□ Check Node version compatibility
□ Test locally: npm run build:css
□ Check composer.json for errors
□ Check package.json for errors
```

### Database Connection Error?
```
□ Verify DB_HOST correct
□ Verify DB_USERNAME correct
□ Verify DB_PASSWORD correct
□ Check if database exists
□ Check IP whitelist (cloud DB)
```

### CSS/JS Not Loading?
```
□ Clear browser cache (Ctrl+Shift+Del)
□ Check build was successful
□ Verify npm run build:css ran
□ Check public folder permissions
□ Check APP_URL is correct
```

### Login Not Working?
```
□ Check database has users table
□ Check migrations ran
□ Check seeders ran
□ Verify credentials in database
```

---

## 🎉 FINAL VERIFICATION

- [ ] Application live at: `https://maluku-quizz.vercel.app`
- [ ] Database connected & working
- [ ] Login functional (both guru & siswa)
- [ ] Quiz creation & taking working
- [ ] Points & leaderboard working
- [ ] Animations working
- [ ] Responsive on all devices
- [ ] Auto-deploy functional
- [ ] Logs accessible
- [ ] Ready for production use ✅

---

## 📋 SHARE WITH USERS

```
🌐 Website: https://maluku-quizz.vercel.app

👨‍🏫 Guru Login:
Email: guru@example.com
Password: password

👨‍🎓 Siswa Login:
Email: murid@example.com
Password: password

📱 Accessible dari:
✅ Desktop
✅ Laptop  
✅ Smartphone
✅ Tablet
✅ Mana saja ada internet
```

---

## 🚀 NEXT STEPS (After Deployment)

- [ ] Share URL dengan guru & siswa
- [ ] Collect feedback
- [ ] Fix bugs found
- [ ] Make improvements
- [ ] Git push changes (auto-deploy)
- [ ] Monitor usage & performance
- [ ] Scale if needed
- [ ] Add more features
- [ ] Celebrate! 🎉

---

**Status:** Ready for Production ✅

Date Deployed: ___________  
Deployed By: ___________  
Notes: _____________________________

---

**Questions? Check:**
- VERCEL_DEPLOYMENT_GUIDE.md (detailed)
- VERCEL_QUICK_START.md (commands)
- VERCEL_VISUAL_GUIDE.md (visual steps)
