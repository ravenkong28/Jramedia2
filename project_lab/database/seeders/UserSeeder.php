<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Customer Matthew',
                'is_admin' => 0,
                'email' => 'customer@yahoo.co.id',
                'password' => bcrypt('customer123')
            ],
            [
                'name' => 'Admin Raven',
                'is_admin' => 1,
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin123')
            ],
        ]);
    }
}
