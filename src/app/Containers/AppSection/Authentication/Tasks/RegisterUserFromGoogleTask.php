<?php

namespace App\Containers\AppSection\Authentication\Tasks;

use App\Containers\AppSection\User\Data\Repositories\UserRepository;
use App\Containers\AppSection\User\Models\User;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class RegisterUserFromGoogleTask extends ParentTask
{
    public function __construct(protected UserRepository $repository)
    { }

    /**
     * Register new user after Google auth with provided credentials
     *
     * @param \Laravel\Socialite\Contracts\User $socialiteUser
     * @return User
     * @throws CreateResourceFailedException
     */
    public function run(\Laravel\Socialite\Contracts\User $socialiteUser): User
    {
        User::unguard();
        $data = [
            'name' => $socialiteUser->getName(),
            'email' => $socialiteUser->getEmail(),
            'avatar' => $socialiteUser->getAvatar(),
            'email_verified_at' => now(),    // To prevent sending account verification email
        ];

        try {
            $user = $this->repository->create($data);
            $user = $this->repository->update(['nickname' => "id{$user->id}"], $user->id);
        } catch (Exception) {
            throw new CreateResourceFailedException();
        } finally {
            User::reguard();
        }

        return $user;
    }
}
