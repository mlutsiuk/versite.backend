<?php

namespace App\Containers\AppSection\Group\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Group\Actions\GetAllGroupsAction;
use App\Containers\AppSection\Group\UI\API\Requests\GetAllGroupsRequest;
use App\Containers\AppSection\Group\UI\API\Transformers\GroupTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllGroupsController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllGroups(GetAllGroupsRequest $request): array
    {
        $groups = app(GetAllGroupsAction::class)->run();

        return $this->transform($groups, GroupTransformer::class);
    }
}
