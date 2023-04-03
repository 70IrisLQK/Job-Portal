<?php

namespace Database\Seeders;

use App\Models\Experience;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $experiences = [
            [
                'name' => 'Fresher'
            ],
            [
                'name' => '1 Year'
            ],
            [
                'name' => '2 Years'
            ],
            [
                'name' => '3 Years'
            ],
            [
                'name' => '4 Years'
            ],
            [
                'name' => '5 Years'
            ],
        ];
        foreach ($experiences as  $experience) {
            Experience::updateOrCreate($experience);
        }
    }
}