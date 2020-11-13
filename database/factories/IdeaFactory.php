<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Idea;
use Faker\Generator as Faker;

$factory->define(Idea::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(4),
        'description' => $faker->text,
        'project_category' => $faker->randomNumber(),
    ];
});
