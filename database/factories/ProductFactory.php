<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Product::class, function (Faker $faker) {
    $branches = App\Models\Branch::all()->pluck('id')->toArray();

    return [
        'name_ar' => 'Product '.$faker->unique()->numberBetween(50,3030000),
        'name_en' => 'Product '.$faker->unique()->numberBetween(50,3030000),
        'description_ar' => $faker->text($maxNbChars = 200),
        'description_en' => $faker->text($maxNbChars = 200),
        'packing_unit' => $faker->numberBetween(50,500),
        'packaging' => $faker->numberBetween(50,500),
        'attributes' => 'Blue, Pink, Black' ,
        'category_level1_id' => 4,
        'category_level2_id' => 4,
        'category_level3_id' => 3,
        'category_level4_id'=> 2,
        'thumbnail' => 'productImages/1/NDPb8yp74aZQuXpdcEAmpIDgECQbX4QzVy1bwTWv.jpeg',
        'branch_id'=> $faker->randomElement($branches),
        'brand_id'=> $faker->randomElement([1,2,5,6,7,8,9,10,11]),
    ];
});
