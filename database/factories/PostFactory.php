<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'       => mt_rand(1,10),
            'category_id'   => mt_rand(1,5),
            'title'         => $this->faker->sentence(mt_rand(5,10)),
            'excerpt'       => $this->faker->sentence(mt_rand(15,20)),
            'slug'          => $this->faker->slug(),
            'body'          => $this->faker->paragraph(50),
            'image'         => $this->faker->imageUrl(640, 480, 'animals', true)
        ];
    }
}
