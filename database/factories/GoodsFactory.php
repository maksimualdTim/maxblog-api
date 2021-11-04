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
            'category' => function () {
                return Category::factory()->create()->id;
            },
            'name' => $this->faker->asciify('********************'),
            'shortDesc' => $this->faker->text(500),
            'fullDesc' => $this->faker->text(1000),
            'preview' => function () {
                return File::factory()->create()->id;
            },
            'price' => $this->faker->randomFloat(2, 1, 100),
        ];
    }
}
