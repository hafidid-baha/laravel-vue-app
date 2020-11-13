<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProjectCategory;
use Faker\Generator as Faker;

$factory->define(ProjectCategory::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'icon' => $faker->word,
        'tag' => $faker->word,
    ];
});
