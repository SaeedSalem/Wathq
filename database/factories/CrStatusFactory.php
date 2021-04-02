<?php

namespace Database\Factories;

use App\Models\CrStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class CrStatusFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CrStatus::class;

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
