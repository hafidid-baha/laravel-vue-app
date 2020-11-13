<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Interest;
use Faker\Generator as Faker;

$factory->define(Interest::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(4),
        'description' => $faker->text,
    ];
});
