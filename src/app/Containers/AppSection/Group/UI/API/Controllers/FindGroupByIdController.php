<?php

namespace App\Containers\AppSection\Group\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Group\Actions\FindGroupByIdAction;
use App\Containers\AppSection\Group\UI\API\Requests\FindGroupByIdRequest;
use App\Containers\AppSection\Group\UI\API\Transformers\GroupTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;

class FindGroupByIdController extends ApiController
{
    /**
     * @throws InvalidTransformerException|NotFoundException
     */
    public function findGroupById(FindGroupByIdRequest $request): array
    {
        $group = app(FindGroupByIdAction::class)->run($request->validated()['id']);

        return $this->transform($group, GroupTransformer::class);
    }
}
