<?php

namespace Database\Factories;

use App\Models\User;
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

    private function title($nbWords = 3)
    {
        $sentence = $this->faker->sentence($nbWords);
        return substr($sentence, 0, strlen($sentence) - 1);
    }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'user_id' => User::factory(),
            'title' => $this->title(),
            'author' => $this->faker->name,
            'published_on' => $this->faker->date,
        ];
    }
}
