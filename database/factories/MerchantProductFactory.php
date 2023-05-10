<?php

use Faker\Generator as Faker;

$factory->define(App\Models\MerchantProduct::class, function (Faker $faker) {
    $merchants = App\Models\Merchant::all()->pluck('id')->toArray();

    foreach ($merchants as $merchant) {
        $branches = App\Models\Branch::where('merchant_id', $merchant)->pluck('id')->toArray();
        # code...
        foreach ($branches as $branch) {
            # code...
            
        }
    }

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
        
        
        
        'merchant_id' => $faker->randomElement($merchants),
        'branch_id'=> $faker->randomElement($branches),
        'brand_id',
        'product_id',
        'base_price',
        'price_with_tax',
        'offer_price',
        'tax',
        'cat_level1',
        'cat_level2',
        'cat_level3',
        'cat_level4',
        'origin_country',
        'available_quantity',
        'min_order_level',
        'attributes',
        'merchant_user_id',
        'availability',
        'is_approved',
        'packaging',
        'unit_packing',
        'description_ar',
        'description_en',
        'status',
        'featured'
    ];
});
