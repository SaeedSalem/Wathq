<?php

namespace Database\Seeders;

use App\Models\Cr;
use Illuminate\Database\Seeder;

class CrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cr::factory()->count(50)->create();
    }
}
