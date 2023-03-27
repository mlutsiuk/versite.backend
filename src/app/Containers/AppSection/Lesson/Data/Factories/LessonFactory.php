<?php

namespace App\Containers\AppSection\Lesson\Data\Factories;

use App\Containers\AppSection\Lesson\Models\Lesson;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class LessonFactory extends ParentFactory
{
    protected $model = Lesson::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->title(),
            'course_id' => 1,
            'date' => $this->faker->dateTime()
        ];
    }
}
