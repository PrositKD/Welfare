<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Road;

class RoadSeeder extends Seeder
{
    public function run()
    {
        for ($roadNo = 1; $roadNo <= 25; $roadNo++) {
            foreach (range('A', 'D') as $block) {
                Road::create([
                    'road_no' => $roadNo,
                    'block' => $block,
                    'is_assign' => 0,
                ]);
            }
        }
    }
}
