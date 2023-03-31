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
        $pageFAQ = ['title' => 'FAQ', 'description' => 'FAQ', 'image' => 'no_image.jpg'];

        PageFAQ::updateOrCreate($pageFAQ);
    }
}