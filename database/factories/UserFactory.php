<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt('123456'), // password
        'remember_token' => Str::random(10),
    ];
});
$factory->define(\App\Medicine::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'manufacturer_id' => rand(1,20),
        'substance_id' => rand(1,20),
        'price' => $faker->randomFloat(2, 200, 888),
    ];
});
$factory->define(\App\Manufacturer::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});
$factory->define(\App\Substance::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});