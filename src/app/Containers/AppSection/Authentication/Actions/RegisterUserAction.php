<?php

namespace App\Containers\AppSection\Authentication\Actions;

use App\Containers\AppSection\Authentication\Data\Dto\RegisterUserDto;
use App\Containers\AppSection\Authentication\Exceptions\LoginFailedException;
use App\Containers\AppSection\Authentication\Tasks\CreateAccessTokenForAuthenticatedUserTask;
use App\Containers\AppSection\Authentication\Tasks\HashPasswordTask;
use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Actions\Action as ParentAction;
use Illuminate\Support\Facades\Auth;

class RegisterUserAction extends ParentAction
{
    /**
     * @param RegisterUserDto $dto
     * @return string User access token
     * @throws LoginFailedException
     */
    public function run(RegisterUserDto $dto): string
    {
        // Create user by given credentials
        $user = new User;
        $user->name = $dto->name;
        $user->nickname = $dto->nickname;
        $user->email = $dto->email;
        $user->password = app(HashPasswordTask::class)->run($dto->password);
        $user->save();

        // Login as newly created user
        Auth::guard('web')->login($user);

        // Generate and return personal access token
        return app(CreateAccessTokenForAuthenticatedUserTask::class)->run();
    }
}
