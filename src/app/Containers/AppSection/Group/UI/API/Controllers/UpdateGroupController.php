<?php

namespace App\Containers\AppSection\Group\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Group\Actions\UpdateGroupAction;
use App\Containers\AppSection\Group\Data\Dto\UpdateGroupDto;
use App\Containers\AppSection\Group\UI\API\Requests\UpdateGroupRequest;
use App\Containers\AppSection\Group\UI\API\Transformers\GroupTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdateGroupController extends ApiController
{
    /**
     * @param UpdateGroupRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function updateGroup(UpdateGroupRequest $request): array
    {
        $dto = new UpdateGroupDto($request->validated());
        $group = app(UpdateGroupAction::class)->run($dto, $request->validated()['id']);

        return $this->transform($group, GroupTransformer::class);
    }
}
