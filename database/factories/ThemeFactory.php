<?php

namespace Database\Factories;

use App\Models\Theme;
use Illuminate\Database\Eloquent\Factories\Factory;

class ThemeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Theme::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'title'    => $this->faker->realText($maxNbChars = 10),
            'url'      => $this->faker->url,
            'image'      => $this->faker->imageUrl($width = 640, $height = 480, $category = null, $randomize = true, $word = null, $gray = false),
            'description'  => $this->faker->realText($maxNbChars = 10)
        ];
    }
}
