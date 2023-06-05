<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Resume>
 */
class ResumeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => 'Mehdi Saadi',
            'background_img' => 'background_name',
            'name' => 'Mehdi Saadi',
            'iam' => 'Developer, Freelancer',
            'about_txt' => 'Love PHP and interested in learning more about web development and cyber security.',
            'about_img' => 'about_name',
            'about_title' => 'Web Developer',
            'birthday' => '12 October 2003',
            'age' => 20,
            'phone' => '09339514886',
            'degree' => 'Bachelor',
            'email' => 'mehdi.0.saadi@gmail.com',
            'available' => 1,
            'location' => 'Qom, Iran',
            'facts_txt' => 'nothing',
            'clients' => 0,
            'projects_done' => 15,
            'awards' => 0,
            'skills_txt' => 'nothing',
            'resume_txt' => 'nothing',
            'last_words' => 'last words'
        ];
    }
}
