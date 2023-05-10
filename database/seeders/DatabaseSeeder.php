<?php

// use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $faker = Faker::create();
        // $this->call(UsersTableSeeder::class);
        // $this->call(MerchantTableSeeder::class);
        // $this->call(MerchantUserTableSeeder::class);
        // $this->call(DistrictTableSeeder::class);
        // $this->call(CityTableSeeder::class);
        // $this->call(BranchTableSeeder::class);
        // $this->call(ProductTableSeeder::class);

        // Create branch users
        // $merchants = App\Models\Merchant::all()->pluck('id')->toArray();
        // foreach ($merchants as $merchant) {
        //     $branches = App\Models\Branch::where('merchant_id', $merchant)->pluck('id')->toArray();
        //     $merchantUsers = App\Models\MerchantUser::where('merchant_id', $merchant)->pluck('id')->toArray();

        //     if(count($branches) > 0 && count($merchantUsers) > 0){
        //         foreach ($branches as $branch) {
        //             App\Models\BranchUser::create( [
        //                 'branch_id' => $branch,
        //                 'merchant_user_id' => $faker->randomElement($merchantUsers)
        //             ]);
        //         }
        //     }
        // }




        // create merchant products
        // $merchants = App\Models\Merchant::all()->pluck('id')->toArray();

        // foreach ($merchants as $merchant) {
        //     $branches = App\Models\Branch::where('merchant_id', $merchant)->pluck('id')->toArray();
            
        //     if (count($branches) > 0) {
        //         foreach ($branches as $branch) {
        //             $brnachUsers = App\Models\BranchUser::where('branch_id', $branch)->pluck('merchant_user_id')->toArray();

        //             if (count($brnachUsers) > 0) {
        //                 $merchantUsers = App\Models\MerchantUser::whereIn('id', $brnachUsers)->where('role_id', 1)->pluck('id')->toArray();
        //                 if (count($merchantUsers) > 0) {

        //                     $products = App\Models\Product::limit(2)->orderBy(DB::raw('RAND()'))->get();

        //                     foreach ($products as $product) {
        //                         # code...
        //                         App\Models\MerchantProduct::create([
        //                             'merchant_id' => $faker->randomElement($merchants),
        //                             'branch_id' => $faker->randomElement($branches),
        //                             'brand_id' => $product->brand_id,
        //                             'product_id' => $product->id,
        //                             'base_price' => 1200,
        //                             'price_with_tax' => 1350,
        //                             'offer_price' => 150,
        //                             'tax' => 10,
        //                             'cat_level1' => $product->category_level1_id,
        //                             'cat_level2' => $product->category_level2_id,
        //                             'cat_level3' => $product->category_level3_id,
        //                             'cat_level4' => $product->category_level4_id,
        //                             'available_quantity' => $faker->randomDigit,
        //                             'min_order_level' => $faker->randomDigit,
        //                             'attributes' => $product->attributes,
        //                             'merchant_user_id' => $faker->randomElement($merchantUsers),
        //                             'availability' => 1,
        //                             'is_approved' => 1,
        //                             'packaging' => $product->packaging,
        //                             'unit_packing' => $product->packing_unit,
        //                             'description_ar' => $product->description_ar,
        //                             'description_en' => $product->description_en,
        //                             'status' => 1,
        //                             'featured' => $faker->randomElement([1, 0]),
        //                         ]);
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
    }
}
