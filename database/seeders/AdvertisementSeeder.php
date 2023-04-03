<?php

namespace Database\Seeders;

use App\Models\Advertisement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdvertisementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $advertisementSeeder = [
            'job_listing_ad' => 'ad-1.png',
            'job_listing_ad_status' => 1,
            'company_listing_ad' => 'ad-2.png',
            'company_listing_ad_status' => 1,
        ];

        Advertisement::updateOrCreate($advertisementSeeder);
    }
}