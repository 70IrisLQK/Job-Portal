<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            'name' => 'Khanh Dev',
            'email' => 'khanh.dev@gmail.com',
            'avatar' => 'avatar-1.png',
            'password' => Hash::make('123456'),
        ];

        Admin::updateOrCreate($admin);
    }
}