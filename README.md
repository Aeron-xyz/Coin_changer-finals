For groupmates (clone & run)

cd C:\xampp\htdocs

git clone https://github.com/Aeron-xyz/Coin_changer-finals.git "Finals IT10"

cd "Finals IT10"

composer install

copy .env.example .env

php artisan key:generate

# MySQL: create database coin_changer in phpMyAdmin, then set DB_* in .env
# OR SQLite: DB_CONNECTION=sqlite and: type nul > database\database.sqlite
php artisan migrate:fresh --seed



npm install



npm run build


php artisan serve

Login: admin / password123

If they already cloned before

git pull origin main

composer install

npm install

php artisan migrate

npm run build
