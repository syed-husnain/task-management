<?php

use Faker\Generator as Faker;

$factory->define(App\Models\District::class, function (Faker $faker) {
    return [
        'name' => 'District '. $faker->unique()->numberBetween(1000,999999),
    ];
});
