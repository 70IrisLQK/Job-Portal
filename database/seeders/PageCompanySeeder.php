<?php

namespace Database\Seeders;

use App\Models\PageCompany;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pageCompany = [
            'title' => 'Company Listing',
            'image' => 'banner8.jpg',
            'seo_title' => 'Jobs in Ho Chi Minh & Ha Noi | FindJob',
            'seo_description' => '1000 top IT jobs for you in Ho Chi Minh | Ha Noi | Da Nang on FindJob.com. Leading companies, high salary. Get your new job now!',
            'seo_image' => 'seo_image.png',
        ];

        PageCompany::updateOrCreate($pageCompany);
    }
}