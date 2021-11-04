<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\File;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'author_id' => function () {
                return User::factory()->create()->id;
            },
            'title' => $this->faker->title,
            'shortText' => $this->faker->text(500),
            'text' => $this->faker->text(1000),
            'preview' => function () {
                return File::factory()->create()->id;
            },
            'views' => $this->faker->numberBetween(0, 200),
            'category' => function () {
                return Category::factory()->create()->id;
            },
        ];
    }
}
