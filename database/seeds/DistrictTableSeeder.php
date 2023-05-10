<?php

use Illuminate\Database\Seeder;

class DistrictTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\District::class, 26)->create()->each(function ($district) {
            $district->save(factory(App\Models\District::class)->make()->toArray());

        });
    }
}
