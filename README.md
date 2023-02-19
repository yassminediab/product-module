<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Product Module
This product module is to manage your products(add , edit , list , delete and show)

## Technologies
- PHP / Laravel / Mysql

## Features
- product module which contain product's name, price, status, person's information who add the product and product's type
- all product's previous record history migration and model
- Product's add, edit, delete, show, and index methods.
- List all products with created users
- Filter by name and user
- Send notification email after creating the product

## Installation
Make sure that all ports is available
```bash
$ git clone git@github.com:yassminediab/product-module.git
$ cp .env.example .env
$ docker-compose up --build
--------------------
$ docker exec product_module COMPOSER_MEMORY_LIMIT=-1 composer install
$ docker exec product_module php artisan migrate --seed
$ docker exec product_module php artisan queue:work --queue=high,default

Or 

$ docker exec -it product_module bash 
$ COMPOSER_MEMORY_LIMIT=-1 composer install 
$ php artisan migrate --seed
$ php artisan queue:work --queue=high,default

```

## Running the app

```bash
# development
run application on port 8000
```

## Postman Collection

<p><a href="https://drive.google.com/file/d/1QOHzB5e0o3XX4pXAwshNTmVP2VG7T1fV/view?usp=sharing" target="_blank">Postman Collection</a></p>
