<?php

namespace Database\Seeders;

use App\Models\OtherItems;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OtherItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $otherItem = [
            'login_page_heading' => 'Login',
            'login_page_title' => 'Login',
            'login_page_seo_description' => 'Login',
            'register_page_heading' => 'Register',
            'register_page_title' => 'Register',
            'register_page_seo_description' => 'Register',
            'forget_password_page_heading' => 'Forget Password',
            'forget_password_page_title' => 'Forget Password',
            'forget_password_page_seo_description' => 'Forget Password',
        ];

        OtherItems::updateOrCreate($otherItem);
    }
}