<?php

use Illuminate\Database\Seeder;

class BranchTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Branch::class, 30)->create()->each(function ($branch) {
            $branch->save(factory(App\Models\Branch::class)->make()->toArray());
        });
    }
}
