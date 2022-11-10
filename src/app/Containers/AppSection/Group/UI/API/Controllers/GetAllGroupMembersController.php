<?php

namespace App\Containers\AppSection\Group\UI\API\Controllers;

use App\Containers\AppSection\Group\Actions\GetAllGroupMembersAction;
use App\Containers\AppSection\Group\UI\API\Requests\GetAllGroupMembersRequest;
use App\Containers\AppSection\User\UI\API\Transformers\UserTransformer;
use App\Ship\Parents\Controllers\ApiController;

class GetAllGroupMembersController extends ApiController
{
    public function getAllGroupMembers(GetAllGroupMembersRequest $request, $group_id)
    {
        $members = app(GetAllGroupMembersAction::class)->run($group_id);
        
        return $this->transform($members, UserTransformer::class);
    }
}
