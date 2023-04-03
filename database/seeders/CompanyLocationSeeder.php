<?php

namespace Database\Seeders;

use App\Models\CompanyLocation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyLocationSeeder extends Seeder
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
            CompanyLocation::updateOrCreate($location);
        }
    }
}