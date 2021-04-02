<?php

namespace Database\Factories;

use App\Models\CrBusinessType;
use Illuminate\Database\Eloquent\Factories\Factory;

class CrBusinessTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CrBusinessType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word()
        ];
    }
}
