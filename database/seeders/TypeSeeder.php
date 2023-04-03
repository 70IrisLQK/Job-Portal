<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                'name' => 'Full Time'
            ],
            [
                'name' => 'Part Time'
            ],
            [
                'name' => 'Contractual'
            ],
            [
                'name' => 'Internship'
            ],
            [
                'name' => 'Freelance'
            ],

        ];
        foreach ($types as  $type) {
            Type::updateOrCreate($type);
        }
    }
}