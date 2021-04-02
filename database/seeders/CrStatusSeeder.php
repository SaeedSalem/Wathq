<?php

namespace Database\Seeders;

use App\Models\CrStatus;
use Illuminate\Database\Seeder;

class CrStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CrStatus::factory()->count(50)->create();
    }
}
