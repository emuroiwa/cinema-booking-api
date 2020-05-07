# Cinema Booking API

A tutorial on how it was made is avaiable here
http://www.ernestmuroiwa.com/laravel-restful-api/

Cinema Booking API app made with Laravel 7 and Mysql DB

# Requirements

-   PHP 7 >=
-   Composer
-   Mysql

# Setup

You need to clone the project to create a local copy on your system.
Run the following on your terminal:

```
git clone https://github.com/emuroiwa/cinema-booking-api.git
```

Then change into the project's directory by running the following on your terminal:

```
cd cinema-booking-api

```

As you already have composer installed, run the following on your terminal:

```
composer install
```

or:

```
composer update
```

# Configurations

After complete setup process you have to configure you database credentials. First copy `.env.example` as `.env`

```shell
cp .env.example .env
```

To generate key please run this:

```
php artisan key:generate
```

Now open `.env` file and write database informations. Then run migrate from you terminal

```shell
php artisan migrate
```

Now run the DB seeder

```shell
php artisan db:seed --class=DatabaseSeeder
```

# Running the project

Run the following on your on your terminal:

```
php artisan serve
```

and access the website on your local website with this url localhost:8000.
