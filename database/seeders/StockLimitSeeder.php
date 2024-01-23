<?php

namespace Database\Seeders;

use App\Models\StockLimit;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StockLimitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StockLimit::create([
            'low' => 20,
            'high' => 100,
        ]);
    }
}
