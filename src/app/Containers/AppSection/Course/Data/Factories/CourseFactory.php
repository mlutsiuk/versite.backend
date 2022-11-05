<?php

namespace App\Containers\AppSection\Course\Data\Factories;

use App\Containers\AppSection\Course\Models\Course;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class CourseFactory extends ParentFactory
{
    protected $model = Course::class;

    public function definition(): array
    {
        return [
             'title' => $this->faker->title(),
             'slug' => $this->faker->slug(),
             'description' => $this->faker->text()
        ];
    }
}
