<?php

use Illuminate\Database\Seeder;

class MerchantProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\MerchantProduct::class, 10)->create()->each(function ($merchantProduct) {
            $merchantProduct->save(factory(App\Models\MerchantProduct::class)->make()->toArray());

        });
    }
}
