<?php

use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\City::class, 26)->create()->each(function ($city) {
            $city->save(factory(App\Models\City::class)->make()->toArray());

        });
    }
}
