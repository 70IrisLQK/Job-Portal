<?php

namespace Database\Seeders;

use App\Models\CompanyIndustry;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyIndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $industries = [
            [
                'name' => 'Accounting Firm'
            ],
            [
                'name' => 'IT Firm'
            ],
            [
                'name' => 'Law Firm'
            ],
            [
                'name' => 'Real Estate Company'
            ],
            [
                'name' => ' Software Company'
            ],
        ];
        foreach ($industries as  $industry) {
            CompanyIndustry::updateOrCreate($industry);
        }
    }
}