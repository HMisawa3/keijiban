<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Theme;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'theme_id'=> Theme::factory(),
            'visitor' => $this->faker->ipv4,
            'post'    => $this->faker->realText($maxNbChars = 50)
        ];
    }
}
