<?php

namespace Database\Factories;

use App\Models\Article;
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
            'author_id' => $this->foreignKeyRandomItem(User::class),
            'title' => $this->faker->asciify('********************'),
            'shortText' => $this->faker->text(500),
            'text' => $this->faker->text(1000),
            'views' => $this->faker->numberBetween(0, 200),
            'category_id' => $this->foreignKeyRandomItem(Category::class),
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

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterMaking(function (Article $article) {
            //
        })->afterCreating(function (Article $article) {
            $files = File::all();

            if($files->count() !== 0){
                $id = rand(1, $files->count());
                $file = File::where('id', '=', $id)->where('article_id', '=', null);

                if($file->count() !== 0){
                    $article->update(['preview' => $id]);
                    $file->update(['article_id' => $article->id]);
                }
            }
        });
    }

}
