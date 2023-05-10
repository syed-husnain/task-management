<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Branch::class, function (Faker $faker) {
    $cities = App\Models\City::all();
    $merchants = App\Models\Merchant::all()->pluck('id')->all();

    for ($i=0; $i < count($cities); $i++) { 
        return [
            'branch_name_en' => 'Branch'.$faker->unique()->numberBetween(50,3030000),
            'branch_name_ar' => 'Branch'.$faker->unique()->numberBetween(50,354333122),
            'city_id' => $cities[$i]->id,
            'district_id' => $cities[$i]->district_id,
            'address_en' => $faker->address,
            'address_ar' => $faker->address,
            'phone' => $faker->e164PhoneNumber,
            'lat' => $faker->latitude($min = -90, $max = 90),
            'lng' => $faker->longitude($min = -180, $max = 180),
            'merchant_id' => $faker->randomElement($merchants),
        ];
    }
});
