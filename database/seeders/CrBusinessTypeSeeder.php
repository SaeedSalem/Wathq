<?php

namespace Database\Seeders;

use App\Models\CrBusinessType;
use Illuminate\Database\Seeder;

class CrBusinessTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CrBusinessType::factory()->count(50)->create();
    }
}
