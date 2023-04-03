<?php

namespace App\Containers\AppSection\Assignment\Data\Factories;

use App\Containers\AppSection\Assignment\Models\Assignment;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class AssignmentFactory extends ParentFactory
{
    protected $model = Assignment::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
