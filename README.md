# Coin Changer Tracking System

A Laravel web application for tracking Philippine peso coin inventory (₱1, ₱5, ₱10, ₱20) with **Admin** and **Cashier (User)** roles. Built with **Laravel 12**, **Laravel Breeze (Blade)**, and **Tailwind CSS**.

---

## Features

| Role | Capabilities |
|------|----------------|
| **Admin** | Dashboard, user management (create/edit/delete cashiers), coin inventory, all transactions, activity logs |
| **Cashier** | Dashboard, load/dispense coin transactions, transaction history, view inventory |

**Authentication:** Username + password login, remember me, role-based redirects, activity logging on login/logout.

---

## Default Login (after seeding)

| Field | Value |
|-------|-------|
| Username | `admin` |
| Password | `password123` |

> Change this password after first login in production.

---

## Tech Stack

- PHP 8.2+
- Laravel 12
- Laravel Breeze (Blade stack)
- Tailwind CSS 3
- SQLite (default) or MySQL (XAMPP)

---

## Terminal Commands (Initial Project Setup)

If you are setting up from scratch (not cloning this repo):

```bash
# 1. Create Laravel project
composer create-project laravel/laravel coin-changer
cd coin-changer

# 2. Install Breeze with Blade + Tailwind
composer require laravel/breeze --dev
php artisan breeze:install blade

# 3. Install Node dependencies and build assets
npm install
npm run build

# 4. Configure environment
cp .env.example .env
php artisan key:generate

# 5. Run migrations and seed default admin + coin inventory
php artisan migrate:fresh --seed
```

---

## Step-by-Step Setup for Groupmates (After Cloning from GitHub)

### Prerequisites

Install these on your machine:

1. **XAMPP** (Apache + MySQL + PHP 8.2+)
2. **Composer** — https://getcomposer.org/
3. **Node.js** (LTS) — https://nodejs.org/
4. **Git** — https://git-scm.com/

---

### Step 1: Clone the repository

```bash
cd C:\xampp\htdocs
git clone <YOUR_GITHUB_REPO_URL> "Finals IT10"
cd "Finals IT10"
```

Replace `<YOUR_GITHUB_REPO_URL>` with your team's actual GitHub link.

---

### Step 2: Install PHP dependencies

```bash
composer install
```

---

### Step 3: Environment file

```bash
copy .env.example .env
php artisan key:generate
```

Open `.env` and set:

```env
APP_NAME="Coin Changer"
APP_URL=http://localhost/Finals%20IT10/public
```

#### Option A — SQLite (easiest, no MySQL setup)

```env
DB_CONNECTION=sqlite
```

Ensure the database file exists:

```bash
# Windows (Git Bash or CMD)
type nul > database\database.sqlite
```

#### Option B — MySQL (recommended for XAMPP)

1. Start **Apache** and **MySQL** in XAMPP Control Panel.
2. Open **phpMyAdmin**: http://localhost/phpmyadmin
3. Create database: `coin_changer`
4. Update `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=coin_changer
DB_USERNAME=root
DB_PASSWORD=
```

---

### Step 4: Run database migrations and seeders

```bash
php artisan migrate:fresh --seed
```

This creates tables and seeds:

- Admin user (`admin` / `password123`)
- Initial coin inventory (₱1, ₱5, ₱10, ₱20)

---

### Step 5: Install frontend assets

```bash
npm install
npm run build
```

For development with hot reload:

```bash
npm run dev
```

---

### Step 6: Run the application

**Option A — XAMPP Apache**

Open in browser:

```
http://localhost/Finals%20IT10/public
```

**Option B — Laravel built-in server**

```bash
php artisan serve
```

Then open: http://127.0.0.1:8000

---

### Step 7: Sign in and test

1. Go to the login page.
2. Sign in as **admin** / **password123**.
3. Create a cashier: **User Management → Add New Cashier**.
4. Log out and sign in as the new cashier to test transactions.

---

## Database Tables

| Table | Purpose |
|-------|---------|
| `users` | fullname, username, password, role (admin/user), status |
| `activity_logs` | login, logout, and system events |
| `coin_inventory` | stock per denomination (1, 5, 10, 20) |
| `transactions` | load/dispense records with coin breakdown |

---

## Project Structure (Key Paths)

```
app/
├── Http/Controllers/Admin/     # Admin dashboards & CRUD
├── Http/Controllers/User/      # Cashier transactions
├── Http/Middleware/            # role, active account checks
├── Models/                     # User, Transaction, CoinInventory, ActivityLog
└── Services/                   # ActivityLogService, CoinInventoryService

database/
├── migrations/                 # Schema definitions
└── seeders/                    # AdminUserSeeder, CoinInventorySeeder

resources/views/
├── admin/                      # Admin Blade pages
├── user/                       # Cashier Blade pages
├── auth/login.blade.php        # Sign-in page
└── layouts/                    # Dark theme layout + sidebar
```

---

## Common Commands

| Task | Command |
|------|---------|
| Reset database | `php artisan migrate:fresh --seed` |
| Clear cache | `php artisan optimize:clear` |
| List routes | `php artisan route:list` |
| Build CSS/JS | `npm run build` |

---

## Git Workflow for the Team

```bash
# Pull latest changes
git pull origin main

# After pulling, if migrations changed:
composer install
npm install
php artisan migrate
npm run build

# Before pushing your work
git add .
git commit -m "Describe your change"
git push origin main
```

---

## Security Notes

- Only **admins** can create cashier accounts (no public registration).
- Inactive users cannot sign in.
- Dispense transactions validate sufficient coin stock.
- Passwords are hashed with bcrypt.
- Use strong passwords in production; change the default admin password.

---

## Troubleshooting

| Problem | Solution |
|---------|----------|
| 500 error / APP_KEY | Run `php artisan key:generate` |
| CSS not loading | Run `npm run build` |
| Migration error | Check `.env` database settings; run `php artisan migrate:fresh --seed` |
| Permission denied (storage) | `php artisan storage:link` and ensure `storage/` is writable |
| Class not found after pull | Run `composer dump-autoload` |

---

## License

Educational project — IT10 Finals.
