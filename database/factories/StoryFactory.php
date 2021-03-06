<?php

namespace Database\Factories;

use App\Models\Story;
use Illuminate\Database\Eloquent\Factories\Factory;

class StoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Story::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "title" => $this->faker->sentence,
            "description" => $this->faker->paragraph,
            "story_type" => '0',
            'priority' => random_int(1,10),
            "story" => $this->faker->image('public/uploads/stories',720,1280, null, false),
            "created_at" => now(),
            "updated_at" => now(),
        ];
    }
}
