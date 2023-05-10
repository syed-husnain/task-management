<?php

use Faker\Generator as Faker;


$factory->define(App\Models\MerchantUser::class, function (Faker $faker) {
    $merchants = App\Models\Merchant::all()->pluck('id')->all();

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'phone' => $faker->unique()->numberBetween(100000000,999999999),
        'role_id' => $faker->randomElement([1,2,3]),
        'merchant_id' => $faker->randomElement($merchants),
    ];
});
