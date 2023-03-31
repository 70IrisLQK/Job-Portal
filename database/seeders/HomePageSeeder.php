<?php

namespace Database\Seeders;

use App\Models\HomePage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomePageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $homepage = [
            'title' => 'Find Your Desired Job',
            'short_title' => 'Search the best, perfect and suitable jobs that matches your skills in your expertise area.',
            'background' => 'banner1.jpg',
            'job_title' => 'Job Title',
            'job_category' => 'Job Category',
            'job_location' => 'Job Location',
            'job_category_title' => 'Job Categories',
            'search' => 'Search',
            'status' => 1,
            'job_category_short_title' => 'Get the list of all the popular job categories here',
            'job_category_status' => 1,
            'why_choose_title' => "Why Choose Us",
            'why_choose_short_title' => "Our Methods to help you build your career in future",
            'why_choose_bg' => "banner2.jpg",
            'why_choose_status' => 1,
            'feature_job_title' => "Featured Jobs",
            'feature_job_short_title' => "Find the awesome jobs that matches your skill",
            'feature_job_status' => 1,
            'testimonial_title' => 'Our Happy Client',
            'testimonial_bg' => 'banner3.jpg',
            'testimonial_status' => 1,
            'latest_news_title' => 'Latest News',
            'latest_news_short_title' => 'Check our latest news from the following section',
            'latest_news_status' => 1,
        ];

        HomePage::updateOrCreate($homepage);
    }
}