<?php

namespace Database\Seeders;

use App\Models\CompanyFounded;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyFoundedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 2000; $i <= 2023; $i++) {
            CompanyFounded::updateOrCreate([
                'name' => $i
            ]);
        }
    }
}