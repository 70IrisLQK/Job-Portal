<?php

namespace Database\Seeders;

use App\Models\CompanySize;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sizes = [
            [
                'name' => '2-5 Persons'
            ],
            [
                'name' => '5-10 Persons'
            ],
            [
                'name' => '10-20 Persons'
            ],
            [
                'name' => '20-50 Persons'
            ],
            [
                'name' => '50-100 Persons'
            ],
            [
                'name' => '100+ Persons'
            ],

        ];
        foreach ($sizes as  $size) {
            CompanySize::updateOrCreate($size);
        }
    }
}