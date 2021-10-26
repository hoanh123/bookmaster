<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'book_id' => $this->faker->randomNumber,
            'book_title' => $this->faker->jobTitle,
            'author_name' => $this->faker->name,
            'publisher' => $this->faker->company,
            'publication_day' =>$this->faker->Date,
        ];
    }
}
