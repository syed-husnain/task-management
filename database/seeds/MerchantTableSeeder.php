<?php

use Illuminate\Database\Seeder;

class MerchantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Merchant::class, 30)->create()->each(function ($merchant) {
            $merchant->save(factory(App\Models\Merchant::class)->make()->toArray());

        });
    }
}
