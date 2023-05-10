<?php

use Illuminate\Database\Seeder;

class MerchantUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\MerchantUser::class, 30)->create()->each(function ($merchantUser) {
            $merchantUser->save(factory(App\Models\MerchantUser::class)->make()->toArray());

        });
    }
}
