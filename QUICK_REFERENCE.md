# ⚡ Quick Reference & Commands

Bookmark halaman ini untuk referensi cepat!

---

## 📋 CHECKLIST SETUP (Copy ke Notes)

### ☐ Instalasi Prerequisites
- [ ] Git installed: `git --version`
- [ ] PHP installed: `php --version`
- [ ] Composer installed: `composer --version`
- [ ] Node.js installed: `node --version`

### ☐ GitHub Setup
- [ ] GitHub account created
- [ ] Git configured: `git config --global user.name "Your Name"`
- [ ] `.gitignore` file created
- [ ] First commit done: `git commit -m "Initial"`
- [ ] Pushed to main: `git push`

### ☐ Vercel Setup
- [ ] Vercel account created (Sign up with GitHub)
- [ ] Project imported from GitHub
- [ ] Build settings configured
- [ ] All env variables added
- [ ] APP_KEY generated & copied
- [ ] Deployment successful (green checkmark)

### ☐ PlanetScale Setup
- [ ] PlanetScale account created
- [ ] Organization created
- [ ] Database `malukuquizz` created
- [ ] Connection credentials copied
- [ ] .env file updated locally
- [ ] `php artisan migrate` ran
- [ ] Env vars added to Vercel
- [ ] Redeployed on Vercel

---

## 💻 COMMAND REFERENCE

### Git Commands (Windows PowerShell)

```powershell
# Initial setup (sekali)
git config --global user.name "Nama Anda"
git config --global user.email "email@gmail.com"
git config --global user.name  # Verify

# Initialize repository
git init
git add .
git commit -m "Initial commit"

# Connect ke GitHub
git remote add origin https://github.com/USERNAME/maluku-quizz.git
git branch -M main
git push -u origin main

# Regular updates
git status                  # Lihat file yang berubah
git add .                   # Stage semua changes
git commit -m "Message"     # Commit
git push                    # Push ke GitHub
git pull                    # Pull dari GitHub (jika ada update dari orang lain)

# View history
git log --oneline           # Lihat commit history
git log -5                  # Lihat 5 commit terakhir
```

---

### Laravel Commands

```powershell
# Generate APP_KEY
php artisan key:generate --show

# Database
php artisan migrate        # Run migrations
php artisan migrate:reset  # Reset database (hapus data)
php artisan migrate:fresh  # Reset + re-migrate
php artisan seed          # Run seeders
php artisan migrate --seed # Migration + seed

# Cache clear
php artisan cache:clear
php artisan config:clear

# Test local
php artisan serve         # Start dev server (http://localhost:8000)

# Tinker (interactive shell)
php artisan tinker
# Di tinker: DB::connection()->getPdo();
# Ketik: exit
```

---

### npm Commands

```powershell
# Install dependencies
npm install

# Build CSS
npm run build:css

# Watch (auto-rebuild saat edit)
npm run watch:css

# Development
npm run dev
```

---

## 🔗 IMPORTANT LINKS

### Credentials Locations
- **GitHub**: https://github.com/YOUR-USERNAME/maluku-quizz
- **Vercel Dashboard**: https://vercel.com/dashboard
- **Vercel Project**: https://vercel.com/dashboard/maluku-quizz
- **PlanetScale Dashboard**: https://app.planetscale.com
- **Live App**: https://maluku-quizz.vercel.app

### Documentation
- Git Docs: https://git-scm.com/doc
- GitHub Docs: https://docs.github.com
- Vercel Docs: https://vercel.com/docs
- Laravel Docs: https://laravel.com/docs/11
- PlanetScale Docs: https://planetscale.com/docs

---

## 📊 ENVIRONMENT VARIABLES TEMPLATE

**Copy & paste ke Vercel "Environment Variables":**

```
APP_NAME=MalukuQuizz
APP_ENV=production
APP_DEBUG=false
APP_KEY=base64:PASTE_HERE_FROM_artisan_key:generate
APP_URL=https://maluku-quizz.vercel.app

CACHE_DRIVER=file
SESSION_DRIVER=cookie
QUEUE_CONNECTION=sync
FILESYSTEM_DISK=public

DB_CONNECTION=mysql
DB_HOST=xxxxx.mysql.planetscale.com
DB_PORT=3306
DB_DATABASE=malukuquizz
DB_USERNAME=xxxxx
DB_PASSWORD=pscale_pw_xxxxxxxxxxxxx
```

---

## 🆘 COMMON ERRORS & FIXES

| Error | Cause | Fix |
|-------|-------|-----|
| `npm: command not found` | Node.js not installed | Download https://nodejs.org, install, restart terminal |
| `composer: command not found` | Composer not installed | Download https://getcomposer.org, install |
| `APP_KEY not set` | Missing env variable | Add APP_KEY to Vercel env vars |
| `Database connection refused` | Wrong credentials | Verify DB credentials in env vars |
| `Build failed on Vercel` | Build command error | Check Vercel logs, fix locally, push to GitHub |
| `git: command not found` | Git not installed | Download https://git-scm.com, install |
| `Port 8000 already in use` | Another app using port | `lsof -i :8000` or use `-p` flag: `php artisan serve --port=8001` |
| `CORS error in browser` | Security issue | Check APP_URL matches domain |

---

## 🔄 TYPICAL WORKFLOW (Setelah Setup)

### 1. Develop Locally
```powershell
php artisan serve
# Buka http://localhost:8000
# Edit files, refresh browser
```

### 2. Test Database
```powershell
php artisan tinker
# DB::connection()->getPdo();
# exit
```

### 3. Commit & Push
```powershell
git status
git add .
git commit -m "Add new quiz feature"
git push
```

### 4. Monitor Deployment
1. Buka https://vercel.com/dashboard
2. Wait for "Production" status ✅
3. Test di https://maluku-quizz.vercel.app

---

## 📱 TESTING CHECKLIST

Setelah deploy, test ini:

```
☐ Homepage loads
☐ Login page works
☐ Can create new quiz
☐ Can answer quiz
☐ Results saved to database
☐ User points updated
☐ Teacher dashboard accessible
☐ Responsive on mobile
☐ No console errors (F12 → Console)
☐ Database data persists (refresh page)
```

---

## 🐛 DEBUG MODE

### Local Debug
```powershell
# Enable debug mode
# Edit .env:
APP_DEBUG=true

# Restart
php artisan serve
```

### Online Debug (Vercel)
1. Vercel Dashboard → Project → Settings → Environment Variables
2. Find `APP_DEBUG`
3. Change to `true`
4. Redeploy
5. Check https://maluku-quizz.vercel.app (akan show detailed errors)
6. **IMPORTANT**: Change back to `false` setelah fix!

### View Logs

**Vercel Logs:**
1. Dashboard → Deployments → klik deployment
2. Lihat logs di tab "Logs"

**Database Logs (PlanetScale):**
1. Database → Insights
2. Lihat query history

---

## 🚀 PERFORMANCE TIPS

### Faster Deployment
- Push hanya file yang berubah (gunakan `.gitignore`)
- Jangan commit `/vendor` atau `/node_modules`
- Jangan commit `.env` (local only)

### Faster Local Development
```powershell
# Use watch mode untuk CSS auto-rebuild
npm run watch:css

# Keep php artisan serve running
php artisan serve
```

### Database Performance
- PlanetScale: Monitor "Insights" tab
- Add indexes untuk frequently-searched columns
- Monitor connection count

---

## 📞 SUPPORT RESOURCES

- GitHub Issues: Create issue di https://github.com/YOUR-USERNAME/maluku-quizz/issues
- Vercel Support: https://vercel.com/support
- PlanetScale Community: https://discord.gg/planetscale
- Laravel Discord: https://discord.gg/laravel

---

## ✨ FINAL NOTES

### Security Reminders ⚠️
- ❌ NEVER commit `.env` file
- ❌ NEVER share APP_KEY or DB_PASSWORD
- ❌ NEVER push credentials to GitHub
- ✅ Use Vercel "Environment Variables" untuk sensitive data
- ✅ Set repository to "Private" jika ada sensitive code

### Best Practices
- ✅ Write descriptive commit messages
- ✅ Commit frequently (small, logical chunks)
- ✅ Pull before push (if working with team)
- ✅ Test locally before pushing
- ✅ Monitor Vercel deployments

### Next Level Setup (Future)
- [ ] Setup CI/CD testing
- [ ] Setup automated backups
- [ ] Setup monitoring & alerts
- [ ] Setup custom domain
- [ ] Setup CDN for images

---

**Happy coding! 🚀**

Untuk bantuan lebih lanjut, refer ke:
- [DETAILED_SETUP_GUIDE.md](DETAILED_SETUP_GUIDE.md) - Step-by-step lengkap
- [GITHUB_HOSTING_GUIDE.md](GITHUB_HOSTING_GUIDE.md) - Overview semua opsi
