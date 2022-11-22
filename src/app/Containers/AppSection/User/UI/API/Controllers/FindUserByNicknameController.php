<?php

namespace App\Containers\AppSection\User\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\User\Actions\FindUserByNicknameAction;
use App\Containers\AppSection\User\UI\API\Requests\FindUserByNicknameRequest;
use App\Containers\AppSection\User\UI\API\Transformers\UserTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;

class FindUserByNicknameController extends ApiController
{
    /**
     * @throws InvalidTransformerException|NotFoundException
     */
    public function findUserByNickname(FindUserByNicknameRequest $request, $nickname): array
    {
        $user = app(FindUserByNicknameAction::class)->run($nickname);

        return $this->transform($user, UserTransformer::class);
    }
}
