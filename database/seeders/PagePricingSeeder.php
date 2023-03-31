<?php

namespace Database\Seeders;

use App\Models\PagePricing;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PagePricingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pagePricing = [
            'title' => 'Pricing',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio.',
            'image' => 'no_image.jpg'
        ];

        PagePricing::updateOrCreate($pagePricing);
    }
}