<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            // AdminSeeder::class,
            // HomePageSeeder::class,
            // CategorySeeder::class,
            // WhyChooseSeeder::class,
            // TestimonialSeeder::class,
            // PostSeeder::class,
            // PageFAQSeeder::class,
            // PageBlogSeeder::class,
            // PageTermSeeder::class,
            // PagePrivacySeeder::class,
            // PageContactSeeder::class,
            // PageCategorySeeder::class,
            // PackageSeeder::class,
            PagePricingSeeder::class,
        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}