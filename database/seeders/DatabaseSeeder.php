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
            AdminSeeder::class,
            HomePageSeeder::class,
            CategorySeeder::class,
            WhyChooseSeeder::class,
            TestimonialSeeder::class,
            PostSeeder::class,
            PageFAQSeeder::class,
            PageBlogSeeder::class,
            PageTermSeeder::class,
            PageCompanySeeder::class,
            PagePrivacySeeder::class,
            PageContactSeeder::class,
            PageCategorySeeder::class,
            PageJobSeeder::class,
            PackageSeeder::class,
            PagePricingSeeder::class,
            OtherItemsSeeder::class,
            CompanySizeSeeder::class,
            CompanyIndustrySeeder::class,
            CompanyFoundedSeeder::class,
            CompanyLocationSeeder::class,
            CompanySeeder::class,
            JobLocationSeeder::class,
            ExperienceSeeder::class,
            TypeSeeder::class,
            CategorySeeder::class,
            GenderSeeder::class,
            SalarySeeder::class,
            JobSeeder::class,
            FAQSeeder::class,
            AdvertisementSeeder::class,
            CandidateSeeder::class,
        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}