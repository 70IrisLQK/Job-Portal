<?php

namespace Database\Seeders;

use App\Models\PageBlog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageBlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pageBlog = ['title' => 'Blog', 'description' => 'Blog', 'image' => 'no_image.jpg'];

        PageBlog::updateOrCreate($pageBlog);
        //
    }
}