<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Expense;
use Faker\Generator as Faker;

$factory->define(Expense::class, function (Faker $faker) {
    return [
        'user_id' => factory(App\User::class),
        'title' => $faker->word(),
        'price' => $faker->randomFloat($nbMaxDecimals=1, $min=3, $max=100),
        'amount' => $faker->numberBetween(1,4),
        'notes' => $faker->sentence(),
    ];
});
