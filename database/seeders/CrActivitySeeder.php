<?php

namespace Database\Seeders;

use App\Models\CrActivity;
use Illuminate\Database\Seeder;

class CrActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CrActivity::factory()->count(50)->create();
    }
}
