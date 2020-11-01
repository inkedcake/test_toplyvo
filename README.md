<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## How to start

For start clone project
- https://github.com/inkedcake/test_toplyvo.git

Then open project and copy file .env.example and paste it with rename to .env

Next step write command in terminal:
 - composer update

Next step write command in terminal:
 - docker-compose build && docker-compose up -d
 
After that go to container:
- docker exec -it test_toplyvo_fpm_1 bash

And generate keys:
 - php artisan key:generate
 - php artisan jwt:secret

Then create migrations, seeds, and fake data:

 - php artisan migrate - migrate all tables
 - php artisan db:seed - create one user for tests
 - php artisan tinker - create many fake data for db
    - factory(App\User::class, 10)->create(); - create 10 users
    - factory(App\Medicine::class, 10)->create();  - create 10 medicines
    - factory(App\Manufacturer::class, 10)->create();  - create 10 manufacturers
    - factory(App\Substance::class, 10)->create();  - create 10 substances
    - exit - to exit from tinker
  
  If you want start test, run in container this command:
   - php artisan test

