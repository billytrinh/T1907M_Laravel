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
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});
$factory->define(\App\Category::class,function (Faker $faker){
    return [
        "category_name"=>$faker->unique()->company
    ];
});
$factory->define(\App\Product::class,function (Faker $faker){
    return  [
      "product_name" => $faker->jobTitle,
      "product_desc" => $faker->text,
      "price" => $faker->numberBetween(0,50000),
      "qty"   => $faker->numberBetween(1, 200),
      "category_id" => $faker->numberBetween(1,5),
      "brand_id" => $faker->numberBetween(1,2),
    ];
});
