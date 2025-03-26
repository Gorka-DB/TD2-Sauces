<?php

namespace Database\Seeders;

use App\Models\Sauce;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SauceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sauce::factory(10)->create();
    }
}
