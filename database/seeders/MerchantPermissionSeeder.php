<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MerchantPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\MerchantPermission::insert([
            [
                'name'=>'Manage Users',
                'slug'=>'manage-users',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'name'=>'Manage Products',
                'slug'=>'manage-products',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'name' => 'Manage Orders',
                'slug'=>'manage-orders',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'name' => 'Manage Request Products',
                'slug'=>'manage-request-products',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'name' => 'Manage Notify Product',
                'slug'=>'manage-notify-product',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'name' => 'Manage Customer',
                'slug'=>'manage-customer',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'name' => 'Manage Product Group',
                'slug'=>'manage-product-group',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'name' => 'Manage Branch',
                'slug'=>'manage-branch',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'name' => 'Manage Product Tax',
                'slug'=>'manage-product-tax',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'name' => 'Manage Discount',
                'slug'=>'manage-discount',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'name' => 'Manage Shipping Method',
                'slug'=>'manage-shipping-method',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'name' => 'Manage Inquiry',
                'slug'=>'manage-inquiry',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'name' => 'Manage Import',
                'slug'=>'manage-import',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'name' => 'Manage Report',
                'slug'=>'manage-report',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],

        ]);
    }
}
