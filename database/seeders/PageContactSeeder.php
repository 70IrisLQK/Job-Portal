<?php

namespace Database\Seeders;

use App\Models\PageContact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pageContact = [
            'title' => 'Contact', 'description' => 'Contact',
            'image' => 'no_image.jpg', 'map_code' => '123456',
        ];

        PageContact::updateOrCreate($pageContact);
    }
}