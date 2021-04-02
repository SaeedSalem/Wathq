<?php

namespace Database\Factories;

use App\Models\Cr;
use App\Models\CrBusinessType;
use App\Models\CrLocation;
use App\Models\CrStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class CrFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cr::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $cr_business_type_id = CrBusinessType::all()->pluck('id')->toArray();
        $cr_status_id = CrStatus::all()->pluck('id')->toArray();
        $cr_location_id = CrLocation::all()->pluck('id')->toArray();
        return [
            'number' => $this->faker->numerify(1010 . str_repeat('#', 6)),
            'entity_number' => $this->faker->companyIdNumber(),
            'name' => $this->faker->company,
            'hijri_issue_date' => date('Y-m-d H:i:s', strtotime(random_int(1400, 1440).'-'.random_int(1,12).'-'.random_int(1,30))),
            'hijri_expiry_date' => date('Y-m-d H:i:s', strtotime(random_int(1410, 1440).'-'.random_int(1,12).'-'.random_int(1,30))),
            'hijri_cancellation_date' => date('Y-m-d H:i:s', strtotime(random_int(1410, 1440).'-'.random_int(1,12).'-'.random_int(1,30))),
            'cancellation_reason' => $this->faker->text(),
            'main_number' => $this->faker->numerify(1010 . str_repeat('#', 6)),
            'activity_description' => $this->faker->text(),
            'cr_business_type_id' => $this->faker->randomElement($cr_business_type_id),
            'cr_status_id' => $this->faker->randomElement($cr_status_id),
            'cr_location_id' => $this->faker->randomElement($cr_location_id),
        ];
    }
}
