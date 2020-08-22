<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Post;
use App\Role;
use App\Photo;
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

$factory->define(Post::class, function (Faker $faker) {
    return [
        'category_id' => $faker->numberBetween(1,15),
        'photo_id' => 1,
        'user_id' => 2,
        'title' => $faker->sentence(11,15),        
        'body' => $faker->paragraphs(rand(4,10), true),
        'slug' => 1,
    ];
});


$factory->define(Role::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['administrator','subscriber']),   
    ];
});

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['PHP','Javascript']),   
    ];    
});

$factory->define(Photo::class, function (Faker $faker) {
    return [
        'file' => 'placeholder.jpg'   
    ];
});