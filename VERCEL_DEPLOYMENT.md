# Vercel Deployment Guide for Laravel Portfolio

## Prerequisites
1. **Vercel Account**: Sign up at [vercel.com](https://vercel.com)
2. **GitHub Repository**: Your code must be pushed to GitHub
3. **Environment Variables**: Generate an APP_KEY for production

## Step 1: Generate Production APP_KEY

Run this command locally to generate a new APP_KEY:
```bash
php artisan key:generate --force
```

Copy the value after `base64:` from your `.env` file.

## Step 2: Push Your Code to GitHub

```bash
git add .
git commit -m "Add Vercel configuration"
git push origin main
```

## Step 3: Connect Vercel to GitHub

1. Go to [vercel.com/dashboard](https://vercel.com/dashboard)
2. Click **"Add New..."** → **"Project"**
3. Select your GitHub repository
4. Choose **"Import Git Repository"**

## Step 4: Configure Environment Variables

In the Vercel dashboard, go to **Settings** → **Environment Variables** and add:

### Required Variables:
```
APP_NAME=Portfolio
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.vercel.app (or your custom domain)
APP_KEY=base64:your_key_here
```

### Database Configuration (Optional):
If using a database, add:
```
DB_CONNECTION=pgsql
DB_HOST=your-db-host
DB_PORT=5432
DB_DATABASE=your-db-name
DB_USERNAME=your-username
DB_PASSWORD=your-password
```

### Session & Cache (Recommended):
```
SESSION_DRIVER=cookie
CACHE_STORE=array
QUEUE_CONNECTION=sync
```

## Step 5: Deploy

1. Return to the dashboard and click **"Deploy"**
2. Wait for the build to complete
3. Once deployed, your app will be available at `your-project.vercel.app`

## Step 6: Set Custom Domain (Optional)

1. In Vercel dashboard, go to **Settings** → **Domains**
2. Add your custom domain
3. Follow the DNS configuration instructions

## Vercel Configuration Files

The following files have been created:

### `vercel.json`
Main Vercel configuration file that:
- Sets build command to install dependencies and build assets
- Configures PHP 8.2 runtime
- Routes all requests to the Laravel application via `api/index.php`

### `api/index.php`
Serverless function entry point that bootstraps and handles all Laravel requests.

### `.vercelignore`
Specifies files to exclude from deployment (node_modules, logs, cache, etc.)

## Troubleshooting

### Build Fails
- Check the build logs in Vercel dashboard for specific errors
- Ensure all environment variables are set
- Verify `composer.json` and `package.json` are in the root directory

### 500 Errors After Deploy
- Check logs in Vercel dashboard (Function Logs tab)
- Verify APP_KEY is set correctly with `base64:` prefix
- Ensure all environment variables are properly configured

### Database Issues
- Verify database credentials in environment variables
- Check database host is accessible from Vercel's servers
- For SQLite: Use persistent database solutions (SQLite doesn't work well on serverless)

### Static Assets Not Loading
- Ensure `npm run build` completes successfully
- Check that `public/` directory is properly built
- Verify paths in your Blade templates

## Performance Tips

1. **Use Caching**: Set up database caching for better performance
2. **Minimize Queries**: Use eager loading in your controllers
3. **Asset Optimization**: Vite is configured with Tailwind CSS for optimal builds
4. **Static Content**: Serve static files from Vercel's CDN (already configured)

## Useful Vercel Commands

```bash
# Install Vercel CLI
npm i -g vercel

# Deploy from command line
vercel

# Deploy in production
vercel --prod

# View logs
vercel logs [URL]
```

## Next Steps

1. Set up a database if your portfolio needs dynamic content
2. Configure email service (e.g., SendGrid, Mailtrap) for contact forms
3. Set up monitoring and error tracking (e.g., Sentry)
4. Configure custom domain and SSL certificate
5. Set up CI/CD for automatic deployments on git push
