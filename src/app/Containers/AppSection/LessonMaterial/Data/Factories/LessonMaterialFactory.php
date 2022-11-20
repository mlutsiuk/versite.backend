<?php

namespace App\Containers\AppSection\LessonMaterial\Data\Factories;

use App\Containers\AppSection\LessonMaterial\Models\LessonMaterial;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class LessonMaterialFactory extends ParentFactory
{
    protected $model = LessonMaterial::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
