<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Task;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(4),
        'description' => $faker->text,
        'duration' => $faker->randomNumber(),
        'project_id' => $faker->randomNumber(),
    ];
});
