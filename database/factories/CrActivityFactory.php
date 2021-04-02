<?php

namespace Database\Factories;

use App\Models\CrActivity;
use Illuminate\Database\Eloquent\Factories\Factory;

class CrActivityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CrActivity::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'name_en' => $this->faker->word()
        ];
    }
}
