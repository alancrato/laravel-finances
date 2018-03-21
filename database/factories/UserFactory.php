<?php

use Faker\Generator as Faker;

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

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(\App\Models\CategoryCosts::class, function (Faker $faker){
    return [
        'name' => $faker->name,
        'user_id' => rand(1,10),
    ];
});

$factory->define(\App\Models\BillReceive::class, function (Faker $faker){
    return [
        'name' => $faker->name,
        'date_launch' => $faker->date(),
        'value' => $faker->randomFloat(2,10,1000),
        'category_id' => rand(1,10),
        'user_id' => rand(1,10),
    ];
});

$factory->define(\App\Models\BillPay::class, function (Faker $faker){
    return [
        'name' => $faker->name,
        'date_launch' => $faker->date(),
        'value' => $faker->randomFloat(2,10,1000),
        'category_id' => rand(1,10),
        'user_id' => rand(1,10),
    ];
});
