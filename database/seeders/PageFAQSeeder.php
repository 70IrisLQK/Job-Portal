<?php

namespace Database\Seeders;

use App\Models\PageFAQ;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageFAQSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pageFAQ = [
            'title' => 'FAQ',
            'image' => 'banner5.jpg',
            'seo_title' => 'Jobs in Ho Chi Minh & Ha Noi | FindJob',
            'seo_description' => '1000 top IT jobs for you in Ho Chi Minh | Ha Noi | Da Nang on FindJob.com. Leading companies, high salary. Get your new job now!',
            'seo_image' => 'seo_image.png',
        ];

        PageFAQ::updateOrCreate($pageFAQ);
    }
}
