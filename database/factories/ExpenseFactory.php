<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Expense;
use Faker\Generator as Faker;

$factory->define(Expense::class, function (Faker $faker) {
    return [
        'user_id' => factory(App\User::class),
        'title' => $faker->word(),
        'category' => $faker->word(),
        'amount' => $faker->numberBetween(1,4),
        'notes' => $faker->sentence(),
    ];
});
