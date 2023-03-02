<?php

namespace App\Containers\AppSection\Authentication\Actions;

use App\Containers\AppSection\Authentication\Data\Dto\RegisterUserDto;
use App\Containers\AppSection\Authentication\Exceptions\LoginFailedException;
use App\Containers\AppSection\Authentication\Tasks\CreateAccessTokenForAuthenticatedUserTask;
use App\Containers\AppSection\Authentication\Tasks\HashPasswordTask;
use App\Containers\AppSection\User\Data\Repositories\UserRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class RegisterUserAction extends ParentAction
{
    public function __construct(protected UserRepository $repository)
    {

    }

    /**
     * @param RegisterUserDto $dto
     * @return string User access token
     * @throws LoginFailedException|CreateResourceFailedException
     */
    public function run(RegisterUserDto $dto): string
    {
        $data = [
            'name' => $dto->name,
//            'nickname' => $dto->nickname,
            'email' => $dto->email,
            'password' => app(HashPasswordTask::class)->run($dto->password)
        ];

        try {
            $user = $this->repository->create($data);
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }

        event(new Registered($user));

        // Login as newly created user
        Auth::guard('web')->login($user);

        // Generate and return personal access token
        return app(CreateAccessTokenForAuthenticatedUserTask::class)->run();
    }
}
