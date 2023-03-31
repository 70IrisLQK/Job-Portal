<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $testimonials = [
            [
                'name' => 'Robert Krol',
                'description' => 'CEO, ABC Company',
                'comment' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ",
                'image' => "t1.jpg",
            ],
            [
                'name' => 'Sal Harvey',
                'description' => 'Director, DEF Company',
                'comment' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ",
                'image' => "t1.jpg",
            ],
        ];

        foreach ($testimonials as $value) {
            Testimonial::updateOrCreate($value);
        }
    }
}