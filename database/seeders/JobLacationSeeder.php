<?php

namespace Database\Seeders;

use App\Models\JobLocation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobLacationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = [
            [
                'name' => 'Australia'
            ],
            [
                'name' => 'Bangladesh'
            ],
            [
                'name' => 'Canada'
            ],
            [
                'name' => 'China'
            ],
            [
                'name' => 'India'
            ],
            [
                'name' => ' United Kingdom'
            ],
            [
                'name' => ' United States'
            ],
        ];
        foreach ($locations as  $location) {
            JobLocation::updateOrCreate($location);
        }
    }
}