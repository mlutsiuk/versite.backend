<?php

namespace App\Containers\AppSection\Group\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Group\Actions\CreateGroupAction;
use App\Containers\AppSection\Group\Data\Dto\CreateGroupDto;
use App\Containers\AppSection\Group\UI\API\Requests\CreateGroupRequest;
use App\Containers\AppSection\Group\UI\API\Transformers\GroupTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreateGroupController extends ApiController
{
    /**
     * @param CreateGroupRequest $request
     * @return JsonResponse
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function createGroup(CreateGroupRequest $request): JsonResponse
    {
        $dto = new CreateGroupDto($request->validated());
        $group = app(CreateGroupAction::class)->run($dto);

        return $this->created($this->transform($group, GroupTransformer::class));
    }
}
