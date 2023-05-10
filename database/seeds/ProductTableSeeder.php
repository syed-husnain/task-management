<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Product::class, 10)->create()->each(function ($product) {
            $product->save(factory(App\Models\Product::class)->make()->toArray());

        });
    }
}
