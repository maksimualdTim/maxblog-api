<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\File;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class FileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->foreignKeyRandomItem(User::class),
            'filename' => $this->faker->asciify('********************'),
            'file_type' => 'jpg',
            'content_type' => 'image/jpeg',
            'byte_size' => $this->faker->randomNumber(),
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
        return $this->afterMaking(function (File $file) {
            //
        })->afterCreating(function (File $file) {
            $articles = Article::all();

            if($articles->count() !== 0){
                $id = rand(1, $articles->count());
                $file->update(['article_id' => $id]);
                $file->save();
            }
        });
    }
}

