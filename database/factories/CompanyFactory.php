<?php

namespace Database\Factories;

use App\Models\CompanyFounded;
use App\Models\CompanyIndustry;
use App\Models\CompanyLocation;
use App\Models\CompanySize;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $image = [
            'logo1.png',
            'logo2.png',
            'logo3.png',
            'logo4.png',
            'logo5.png',
            'logo6.png',
            'logo7.png',
        ];
        $banner = [
            'banner.jpg',
            'banner1.jpg',
            'banner2.jpg',
            'banner3.jpg',
            'banner4.jpg',
            'banner5.jpg',
            'banner6.jpg',
            'banner7.jpg',
            'banner8.jpg',
            'banner9.jpg',
            'banner10.jpg',
            'banner11.jpg',
        ];
        $open = [
            '9:00 AM to 6:00PM',
            '8:00 AM to 5:00PM',
            '8:30 AM to 5:30PM',
        ];

        $companyName = fake()->unique()->company();

        return [
            'company_name' => $companyName,
            'slug' => Str::slug($companyName),
            'person_name' => fake()->name(),
            'username' => fake()->userName(),
            'email' => fake()->unique()->email(),
            'password' => Hash::make(123456),
            'logo' => $image[array_rand($image, 1)],
            'banner' => $banner[array_rand($image, 1)],
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'company_location_id' => CompanyLocation::all()->random()->id,
            'company_size_id' => CompanySize::all()->random()->id,
            'company_founded_id' => CompanyFounded::all()->random()->id,
            'company_industry_id' => CompanyIndustry::all()->random()->id,
            'website' => fake()->url(),
            'description' => fake()->realText(),
            'status' => array_rand([0, 1]),
            'oh_mon' => $open[array_rand($open, 1)],
            'oh_tue' => $open[array_rand($open, 1)],
            'oh_wed' => $open[array_rand($open, 1)],
            'oh_thu' => $open[array_rand($open, 1)],
            'oh_fri' => $open[array_rand($open, 1)],
            'oh_sat' => $open[array_rand($open, 1)],
            'oh_sun' => 'Weekly Holiday',
            'map_code' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d501708.6530135199!2d106.68364605!3d10.76536745!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752eefdb25d923%3A0x4bcf54ddca2b7214!2zVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5o!5e0!3m2!1svi!2s!4v1680439936103!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'facebook' => 'https://github.com/70IrisLQK/Job-Portal',
            'twitter' => 'https://github.com/70IrisLQK/Job-Portal',
            'linkedin' => 'https://github.com/70IrisLQK/Job-Portal',
            'instagram' => 'https://github.com/70IrisLQK/Job-Portal',
        ];
    }
}