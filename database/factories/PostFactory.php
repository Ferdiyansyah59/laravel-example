<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // sentence berarti akan bikin random kalimat dengan mt_rand yang berarti mulai dari 2 - 8 kata
            'title' => $this->faker->sentence(mt_rand(2, 8)),
            'slug' => $this->faker->slug(),
            'excerpt' => $this->faker->paragraph(),
            // 'body' => '<p>'. implode('</p><p>', $this->faker->paragraphs(mt_rand(3, 10))). '</p>', Bisa gini atau
            'body' => collect($this->faker->paragraphs(mt_rand(3,10)))
                        ->map(fn($p)=> "<p>$p</p>")
                        ->implode(''),
            'user_id' => mt_rand(1, 3),
            'category_id' => mt_rand(1, 3)
        ];
    }
}
