<?php

namespace App\Containers\AppSection\Achievement\Data\Factories;

use App\Containers\AppSection\Achievement\Models\CourseAchievement;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class AchievementFactory extends ParentFactory
{
    protected $model = CourseAchievement::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
