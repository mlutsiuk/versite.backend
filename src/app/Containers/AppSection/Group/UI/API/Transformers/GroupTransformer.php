<?php

namespace App\Containers\AppSection\Group\UI\API\Transformers;

use App\Containers\AppSection\Group\Models\Group;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class GroupTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(Group $group): array
    {
        $response = [
            'object' => $group->getResourceKey(),
            'id' => $group->getHashedKey(),
            'title' => $group->title,
            'course_id' => $group->course_id,
            'is_draft' => $group->is_draft,
            'registration_start' => $group->registration_start,
            'registration_end' => $group->registration_end
        ];

        return $this->ifAdmin([
            'real_id' => $group->id,
            'created_at' => $group->created_at,
            'updated_at' => $group->updated_at,
            'readable_created_at' => $group->created_at->diffForHumans(),
            'readable_updated_at' => $group->updated_at->diffForHumans(),
            'deleted_at' => $group->deleted_at,
        ], $response);
    }
}
