<?php

namespace App\Containers\AppSection\Student\Data\Factories;

use App\Containers\AppSection\Student\Models\Student;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class StudentFactory extends ParentFactory
{
    protected $model = Student::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
