<?php

namespace App\Containers\AppSection\Group\Data\Factories;

use App\Containers\AppSection\Group\Models\GroupMember;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class GroupMemberFactory extends ParentFactory
{
    protected $model = GroupMember::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
