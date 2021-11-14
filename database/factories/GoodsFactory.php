<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\File;
use Illuminate\Database\Eloquent\Factories\Factory;

class GoodsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category' => $this->foreignKeyRandomItem(Category::class),
            'name' => $this->faker->asciify('********************'),
            'shortDesc' => $this->faker->text(500),
            'fullDesc' => $this->faker->text(1000),
            'preview' => $this->foreignKeyRandomItem(File::class),
            'price' => $this->faker->randomFloat(2, 1, 100),
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
