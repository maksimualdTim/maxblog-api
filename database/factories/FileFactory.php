<?php

namespace Database\Factories;

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
            'user_id' => function () {
                return User::factory()->create()->id;
            },
            'filename' => $this->faker->firefox,
            'file_type' => 'jpg',
            'content_type' => 'image/jpeg',
            'byte_size' => $this->faker->randomNumber(),
        ];
    }
}
