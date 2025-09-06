# Somaliland e-Visa Portal — Laravel Scaffold (for Laragon)

This bundle is a **scaffold** (app code only). Apply it **on top of a fresh Laravel** install.
It does *not* include Laravel core or vendor packages.

## Prerequisites
- Laragon (Apache/Nginx + MySQL/MariaDB)
- PHP 8.2+
- Composer

## Quick Start (Laragon, Windows)
1) Open terminal in `C:\laragon\www` and create a fresh Laravel app:
   ```bat
   cd C:\laragon\www
   composer create-project laravel/laravel evisa
   ```

2) Unzip this scaffold and copy its contents **into** the new project (overwrite if prompted).  
   Final path should look like `C:\laragon\www\evisa\...`

3) In `evisa/.env`, configure database and app URL:
   ```env
   APP_NAME="E-Visa Portal"
   APP_URL=http://evisa.test

   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=evisa_db
   DB_USERNAME=root
   DB_PASSWORD=
   ```

4) In Laragon, create database `evisa_db` (utf8mb4).

5) Install packages:
   ```bat
   cd C:\laragon\www\evisa
   composer require spatie/laravel-permission barryvdh/laravel-dompdf simplesoftwareio/simple-qrcode
   php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
   ```

6) Migrate & seed:
   ```bat
   php artisan migrate
   php artisan db:seed
   ```

7) (Optional) Create a pretty local domain:
   - Laragon Tray → **Tools > Add Host** → `evisa.test` → path: `C:\laragon\www\evisa\public`

8) Visit `http://evisa.test` (or `http://127.0.0.1:8000` if using `php artisan serve`).  
   Login with:
   - **Email:** admin@evisa.local
   - **Password:** ChangeMe!123

## Project Overview
Roles: `admin`, `officer`, `applicant` (via Spatie Permission).  
Core entities: VisaApplication, Document.  
MVP pages: Applicant dashboard & submission, Officer queue, Admin dashboard, QR verify.

## Next Steps
- Add payments (gateway interface + webhook).
- Style with Tailwind/Bootstrap as desired.
- Add email/SMS notification drivers and templates.

Good luck! 🇸🇴
"# evisa" 
