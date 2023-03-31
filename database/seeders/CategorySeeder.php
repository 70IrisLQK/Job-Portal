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
                'slug' => 'education',
                'icon' => 'fas fa-user-graduate'
            ],
            [
                'name' => 'Commercial',
                'slug' => 'commercial',
                'icon' => 'fas fa-suitcase'
            ],
            [
                'name' => 'Commercial',
                'slug' => 'commercial',
                'icon' => 'fas fa-suitcase'
            ],
            [
                'name' => 'Accounting',
                'slug' => 'accounting',
                'icon' => 'fas fa-landmark'
            ],
            [
                'name' => 'Engineering',
                'slug' => 'engineering',
                'icon' => 'fas fa-magic'
            ],
            [
                'name' => 'Medical',
                'slug' => 'medical',
                'icon' => 'fas fa-stethoscope'
            ],
            [
                'name' => 'Production',
                'slug' => 'production',
                'icon' => 'fas fa-sitemap'
            ],
            [
                'name' => 'Data Entry',
                'slug' => 'data-entry',
                'icon' => 'fas fa-share-alt'
            ],
            [
                'name' => 'Marketing',
                'slug' => 'marketing',
                'icon' => 'fas fa-bullhorn'
            ],
        ];
        foreach ($categories as  $category) {
            Category::updateOrCreate($category);
        }
    }
}