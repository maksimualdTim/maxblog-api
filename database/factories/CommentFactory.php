<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
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
            'article_id' => function () {
                return Article::factory()->create()->id;
            },
            'text' => $this->faker->text(1000),
        ];
    }
}
