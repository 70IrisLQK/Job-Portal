<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $packages = [
            [
                'name' => 'Basic',
                'price' => '19',
                'days' => '15',
                'display_time' => '15 Days',
                'total_allowed_job' => '5',
                'total_allowed_featured_jobs' => '0',
                'total_allowed_photos' => '0',
                'total_allowed_videos' => '0',
            ],
            [
                'name' => 'Standard',
                'price' => '29',
                'days' => '30',
                'display_time' => '30 Days',
                'total_allowed_job' => '15',
                'total_allowed_featured_jobs' => '5',
                'total_allowed_photos' => '5',
                'total_allowed_videos' => '2',
            ],
            [
                'name' => 'Gold',
                'price' => '49',
                'days' => '60',
                'display_time' => '60 Days',
                'total_allowed_job' => '-1',
                'total_allowed_featured_jobs' => '15',
                'total_allowed_photos' => '15',
                'total_allowed_videos' => '10',
            ],
        ];
        foreach ($packages as  $package) {
            Package::updateOrCreate($package);
        }
    }
}