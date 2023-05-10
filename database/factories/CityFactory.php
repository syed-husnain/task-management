<?php

use Faker\Generator as Faker;

$factory->define(App\Models\City::class, function (Faker $faker) {
    $districts = App\Models\District::all()->pluck('id')->toArray();
    return [
        'name' => $faker->city,
        'district_id' => $faker->randomElement($districts),
        'country_id' => 1
    ];
});
