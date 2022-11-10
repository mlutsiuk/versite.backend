<?php

namespace App\Containers\AppSection\Group\UI\API\Transformers;

use App\Containers\AppSection\Group\Models\GroupMember;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class GroupMemberTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(GroupMember $groupmember): array
    {
        $response = [
            'object' => $groupmember->getResourceKey(),
            'id' => $groupmember->getHashedKey(),
        ];

        return $this->ifAdmin([
            'real_id' => $groupmember->id,
            'created_at' => $groupmember->created_at,
            'updated_at' => $groupmember->updated_at,
            'readable_created_at' => $groupmember->created_at->diffForHumans(),
            'readable_updated_at' => $groupmember->updated_at->diffForHumans(),
            // 'deleted_at' => $groupmember->deleted_at,
        ], $response);
    }
}
