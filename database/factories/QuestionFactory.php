<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Question::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'body'  => $faker->paragraph,
        'user_id' => 1
    ];
});
