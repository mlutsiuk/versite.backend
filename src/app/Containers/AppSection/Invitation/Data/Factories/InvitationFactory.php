<?php

namespace App\Containers\AppSection\Invitation\Data\Factories;

use App\Containers\AppSection\Invitation\Models\Invitation;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class InvitationFactory extends ParentFactory
{
    protected $model = Invitation::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
