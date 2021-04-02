<?php

namespace Database\Seeders;

use App\Models\CrLocation;
use Illuminate\Database\Seeder;

class CrLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CrLocation::factory()->count(50)->create();
    }
}
