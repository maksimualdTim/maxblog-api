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
            'author_id' => $this->foreignKeyRandomItem(User::class),
            'article_id' => $this->foreignKeyRandomItem(Article::class),
            'text' => $this->faker->text(1000),
        ];
    }

    private function foreignKeyRandomItem($class)
    {
        $object = $class::all();
        if($object->count() !== 0){
            return rand(1, $object->count());
        }else{
            return $class::factory()->create()->id;
        }
    }
}
