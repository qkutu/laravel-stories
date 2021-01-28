<?php

namespace Database\Factories;

use App\Models\Setting;
use Illuminate\Database\Eloquent\Factories\Factory;

class SettingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Setting::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "title" => "Qkutu - Web Stories with laravel Backend",
            "publisher" => "Qkutu",
            "logo" => $this->faker->image('public/uploads/logos',250,250, null, false),
            "cover" => $this->faker->image('public/uploads/covers',720,1280, null, false),
        ];
    }
}
