<?php

namespace Database\Seeders;

use App\Models\PageCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pageCategory = [
            'title' => 'Job Categories',
            'description' => 'Job Categories',
            'image' => 'no_image.jpg',
        ];

        PageCategory::updateOrCreate($pageCategory);
    }
}