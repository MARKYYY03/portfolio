# Railway Deployment Guide

## Prerequisites
- GitHub repository (public or private)
- Railway account (sign up at railway.app)
- Domain name (optional, Railway provides a default URL)

## Step 1: Prepare Your Repository
1. Commit all changes to GitHub:
   ```bash
   git add .
   git commit -m "Setup Railway deployment configuration"
   git push
   ```

2. Ensure your git repository is clean and all changes are pushed.

## Step 2: Create Railway Project
1. Go to [railway.app](https://railway.app)
2. Click "Start New Project"
3. Select "Deploy from GitHub repo"
4. Select your portfolio repository

## Step 3: Configure Environment Variables
In Railway dashboard, add these variables:

**Essential:**
```
APP_KEY=base64:<your-app-key>
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-railway-domain.up.railway.app
DATABASE_URL=postgresql://...  (Railway auto-generates this)
```

**Optional:**
```
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_FROM_ADDRESS=noreply@example.com
```

## Step 4: Generate APP_KEY
If you don't have an APP_KEY yet, generate one locally:
```bash
php artisan key:generate --show
```
Copy the output and add it to Railway environment variables.

## Step 5: Connect Database (PostgreSQL)
1. In Railway dashboard, add "PostgreSQL" service
2. Railway automatically sets `DATABASE_URL` environment variable
3. Your migrations will run automatically during deployment

## Step 6: Enable Storage Volume (if needed)
If you need persistent storage for file uploads:
1. In Railway service settings, add Volume
2. Mount path: `/app/storage`

## Step 7: Deploy
1. Push to main branch or click "Deploy" in Railway
2. Watch the deployment logs in the Railway dashboard
3. Access your app at the provided URL

## Troubleshooting

**Logs are not accessible:**
```bash
# View logs in Railway dashboard under service details
```

**Database migrations failed:**
- Check DATABASE_URL format in environment variables
- Review migration files for errors

**Missing Node modules:**
- Ensure `package.json` and `package-lock.json` are in git
- Check that npm dependencies are correct

**Assets not loading:**
- Run `npm run build` locally to verify
- Check Vite manifest is generated

## Local Testing (Optional)
To test production build locally:
```bash
npm run build
php artisan serve
```

## Next Steps
- Set up custom domain in Railway (DNS settings)
- Configure email service (Mailgun, SendGrid, etc.)
- Set up monitoring and backups
- Enable SSL/HTTPS (automatic on Railway)
