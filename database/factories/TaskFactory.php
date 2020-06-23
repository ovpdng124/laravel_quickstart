<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Task;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'name'    => $faker->name,
        'user_id' => $faker->numberBetween(1, 2),
    ];
});
