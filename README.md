# laravel2020-D-G1
laravel2020 class D Group 1. WEPEAK

# Requirement
1. PHP 7.x
2. [Composer](https://getcomposer.org/)
3. MySQL / Postgre SQL / others as you want.
4. [Laravel version 6.x](https://laravel.com/docs/6.x)
5. Laravel Datatable by [Yajra](https://yajrabox.com/docs/laravel-datatables/master)

# Installation
This installation step assuming that you already install PHP, Composer, and Database Management App (DMBS) on your local machine. Use your terminal/CMD and follow this steps below.

1. Clone this repo
```
git clone https://github.com/mirza-alim-m/laravel2020-D-G1
```
2. Install Laravel and its dependency with composer
```
composer install
```
3. Make a database scheme at your desired Database Management Application (XAMPP/POSTGRES/etc.) and edit the .env.example file or rename it to .env. In this case, it will use mysql database (Xampp). If .env or .env.example file is missing after `composer install`, then just copy from [this .env](https://github.com/laravel/laravel/blob/master/.env.example) and adjust the code to your case
```
...
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=[Your DB scheme / name]
DB_USERNAME=[Your Username]
DB_PASSWORD=[Your Password]
...

```
4. Generate Key
```
php artisan key:generate
```
5. Migrate all tables
```
php artisan migrate
==== or you can use this command below ====
php artisan migrate:fresh
```
6. If you want to seed data, you can check to `database/seeder/` directory to check the Seeder class name that you want to seed (make sure you check each file before run commands below)
```
php artisan db:seed --class=[SeederClassName]
php artisan db:seed --class=ContainersTableSeeder
php artisan db:seed --class=WatersTableSeeder
php artisan db:seed --class=ProductsSeederClass
==== or you can run all seeder class with this ====
php artisan db:seed
```

7. If You want to generate fake data with Factory for database testing, tinker is an option for you.
```
php artisan tinker
>>> factory(App\Water::class, 100)->create(); // generate 100 fake data
>>> factory(App\Container::class, 100)->create(); // generate 100 fake data
>>> factory(App\Product::class, 100)->create(); // generate 100 fake data
>>> factory(App\Transaction::class, 100)->create(); // generate 100 fake data
>>> factory(App\D_Transaction::class, 500)->create(); // generate 500 fake data
>>> exit();
```

8. Let's make an API of this project, if you want to integrating to your other project. Follow this step to activate it
```
php artisan passport:install
```
9. Then You can start to explore this project with this (remember to activate your DBMS app)
```
php artisan serve
```

# Todo List


Developer : Mokhamad Wijaya
