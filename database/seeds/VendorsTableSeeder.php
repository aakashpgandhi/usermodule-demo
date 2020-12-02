<?php

use Illuminate\Database\Seeder;

class VendorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// \DB::table('admins')->truncate();

        DB::table('vendors')->insert([
            'business_name' => 'vendor',
            'business_email' => 'admin@admin.com',
            'is_active' => 1,
            'password' => bcrypt('admin@123'),
        ]);
    }
}
