<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Education',
                'icon' => 'fas fa-user-graduate'
            ],
            [
                'name' => 'Commercial',
                'icon' => 'fas fa-suitcase'
            ],
            [
                'name' => 'Accounting',
                'icon' => 'fas fa-landmark'
            ],
            [
                'name' => 'Engineering',
                'icon' => 'fas fa-magic'
            ],
            [
                'name' => 'Medical',
                'icon' => 'fas fa-stethoscope'
            ],
            [
                'name' => 'Production',
                'icon' => 'fas fa-sitemap'
            ],
            [
                'name' => 'Data Entry',
                'icon' => 'fas fa-share-alt'
            ],
            [
                'name' => 'Marketing',
                'icon' => 'fas fa-bullhorn'
            ],
            [
                'name' => 'Security',
                'icon' => 'fas fa-lock'
            ],
            [
                'name' => 'Garments',
                'icon' => 'fas fa-users'
            ],
            [
                'name' => 'Telecommunication',
                'icon' => 'fas fa-vector-square'
            ],
            [
                'name' => 'Telecommunication',
                'icon' => 'fas fa-vector-square'
            ],
            [
                'name' => 'Technician',
                'icon' => 'fas fa-street-view'
            ],
        ];
        foreach ($categories as  $category) {
            Category::updateOrCreate($category);
        }
    }
}