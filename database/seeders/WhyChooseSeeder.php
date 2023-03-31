<?php

namespace Database\Seeders;

use App\Models\WhyChoose;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WhyChooseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $chooses = [
            [
                'title' => 'Quick Apply',
                'icon' => 'fas fa-briefcase',
                'description' => 'You can just create your account in our website and apply for desired job very quickly.'
            ],
            [
                'title' => 'Search Tool',
                'icon' => 'fas fa-search',
                'description' => 'We provide a perfect and advanced search tool for job seekers, employers or companies.'
            ],
            [
                'title' => 'Best Companies',
                'icon' => 'fas fa-share-alt',
                'description' => 'The best and reputed worldwide companies registered here and so you will get the quality jobs.'
            ],
        ];

        foreach ($chooses as  $choose) {
            WhyChoose::updateOrCreate($choose);
        }
    }
}