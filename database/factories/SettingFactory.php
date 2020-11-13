<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Setting;
use Faker\Generator as Faker;

$factory->define(Setting::class, function (Faker $faker) {
    return [
        'image' => $faker->word,
        'about' => $faker->text,
        'slug' => $faker->slug,
        'facebook' => $faker->word,
        'linkedin' => $faker->word,
        'github' => $faker->word,
    ];
});
