<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Company;
use App\Models\Experience;
use App\Models\Gender;
use App\Models\JobLocation;
use App\Models\Salary;
use App\Models\Type;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class JobsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $paragraphs = $this->faker->paragraphs(rand(2, 6));
        $title = $this->faker->unique()->realText(50);
        $post = "<h1>{$title}</h1>";
        foreach ($paragraphs as $para) {
            $post .= "<p>{$para}</p>";
        }

        return [
            'company_id' => Company::all()->random()->id,
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => fake()->realText(100),
            'responsibility' => $post,
            'skill' => $post,
            'education' => $post,
            'benefit' => $post,
            'vacancy' => fake()->numberBetween(1, 15),
            'job_category_id' => Category::all()->random()->id,
            'job_location_id' => JobLocation::all()->random()->id,
            'job_type_id' => Type::all()->random()->id,
            'job_experience_id' => Experience::all()->random()->id,
            'job_gender_id' => Gender::all()->random()->id,
            'job_salary_range_id' => Salary::all()->random()->id,
            'map_code' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d501708.6530135199!2d106.68364605!3d10.76536745!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752eefdb25d923%3A0x4bcf54ddca2b7214!2zVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5o!5e0!3m2!1svi!2s!4v1680439936103!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'is_featured' => fake()->randomElement([0, 1]),
            'is_urgent' => fake()->randomElement([0, 1]),
            'status' => fake()->randomElement([0, 1]),
            'deadline' => Carbon::createFromTimeStamp(fake()->dateTimeBetween('-30 days', '+30 days')->getTimestamp()),
        ];
    }
}