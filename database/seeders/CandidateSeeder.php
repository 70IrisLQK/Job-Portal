<?php

namespace Database\Seeders;

use App\Models\Candidate;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            'name' => 'Candidate',
            'username' => 'candidate',
            'email' => 'candidate@gmail.com',
            'image' => 'user.jpg',
            'password' => Hash::make('123456'),
            'status' => 1
        ];

        Candidate::updateOrCreate($admin);
    }
}