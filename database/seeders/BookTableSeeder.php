<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// use Database\Factories\BookFactory;
use App\Models\Book;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::factory()->count(10)->create();
    }
}
