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
            'email' => 'admin@gmail.com',
            'avatar' => 'user.png',
            'password' => Hash::make('123456'),
        ];

        Admin::updateOrCreate($admin);
    }
}