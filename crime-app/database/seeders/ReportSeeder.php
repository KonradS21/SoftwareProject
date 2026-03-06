<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Report;
class ReportSeeder extends Seeder
{
    public function run(): void
    {
        $currentTimestamp = Carbon::now();

        Report::insert([
            [
                'name' => 'Overflowing Public Bin',
                'user_id' => 1,
                'date' => '2026-03-01',
                'latitude' => 53.33523120,
                'longitude' => -6.26745610,
                'description' => 'Public bin overflowing with rubbish causing litter around the area.',
                'severity_scale' => 'low',
                'image' => 'pictures/bin_overflow.jpg',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],
            [
                'name' => 'Broken Streetlight',
                'user_id' => 1,
                'date' => '2026-03-02',
                'latitude' => 53.33387540,
                'longitude' => -6.26234560,
                'description' => 'Streetlight not working making the street very dark at night.',
                'severity_scale' => 'medium',
                'image' => 'pictures/streetlight_broken.jpg',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],
            [
                'name' => 'Illegal Dumping',
                'user_id' => 1,
                'date' => '2026-03-03',
                'latitude' => 53.33765420,
                'longitude' => -6.27011230,
                'description' => 'Large bags of household waste dumped beside the road.',
                'severity_scale' => 'high',
                'image' => 'pictures/illegal_dumping.jpg',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],
            [
                'name' => 'Pothole on Road',
                'user_id' => 1,
                'date' => '2026-03-04',
                'latitude' => 53.33492110,
                'longitude' => -6.26544120,
                'description' => 'Large pothole causing damage risk to cars and bikes.',
                'severity_scale' => 'medium',
                'image' => 'pictures/pothole.jpg',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],
            [
                'name' => 'Fallen Tree Blocking Path',
                'user_id' => 1,
                'date' => '2026-03-05',
                'latitude' => 53.33611220,
                'longitude' => -6.26899230,
                'description' => 'Tree has fallen after strong winds and is blocking the pedestrian walkway.',
                'severity_scale' => 'high',
                'image' => 'pictures/fallen_tree.jpg',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],
        ]);
    }
}