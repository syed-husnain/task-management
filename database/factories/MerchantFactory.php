<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Merchant::class, function (Faker $faker) {
    return [
        // 'remember_token' => str_random(10),
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'phone' => $faker->unique()->numberBetween(100000000,999999999),
        'contact_person' => $faker->name,
        'company_address' => $faker->city,
        'company_name_en' => $faker->word,
        'company_name_ar' => $faker->word,
        'license_number' =>$faker->randomDigit,
        'registeration_number'=>$faker->randomDigit,
        'registeration_expiry' => '2009-10-20',
        'tax_registeration_number' => 1234513232,
        'tax_registeration_expiry' => '2019-10-20',
        'shipping_method' => 'COD',
        'logo_url' => 'merchantLogo/nZZ4rxdVvyTjcuR2rC6tXnzzHFVtJFqeteMMOyf2.png',
    ];
});
