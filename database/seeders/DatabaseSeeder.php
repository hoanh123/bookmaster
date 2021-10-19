<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'hoang hoanh',
                'username' => 'hoanh123',
                'email' => 'hoanh123@gmail.com',
                'password' => bcrypt('hoanh123'),
            ]
        ]);
    }
}
