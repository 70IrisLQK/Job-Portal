<?php

namespace Database\Seeders;

use App\Models\Salary;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SalarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $salaries = [
            [
                'name' => '$100-$500'
            ],
            [
                'name' => '$500-$1000'
            ],
            [
                'name' => '$1000-$1500'
            ],
            [
                'name' => '$1500-$2000'
            ],
            [
                'name' => '$2000-$2500'
            ],
            [
                'name' => '$2500-$3000'
            ],
            [
                'name' => '$3000-$3500'
            ],
            [
                'name' => 'Above $4000'
            ],
        ];
        foreach ($salaries as  $salary) {
            Salary::updateOrCreate($salary);
        }
    }
}