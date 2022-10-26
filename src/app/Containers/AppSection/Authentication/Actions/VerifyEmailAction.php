<?php

namespace App\Containers\AppSection\Authentication\Actions;

use App\Containers\AppSection\Authentication\Data\Dto\VerifyEmailDto;
use App\Containers\AppSection\Authentication\Exceptions\InvalidEmailVerificationDataException;
use App\Containers\AppSection\Authentication\Notifications\EmailVerified;
use App\Containers\AppSection\Authentication\Tasks\HashEmailTask;
use App\Containers\AppSection\User\Tasks\FindUserByIdTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Models\UserModel;

class VerifyEmailAction extends ParentAction
{
    /**
     * @throws InvalidEmailVerificationDataException
     * @throws NotFoundException
     */
    public function run(VerifyEmailDto $dto)
    {
        $user = app(FindUserByIdTask::class)->run($dto->id);


        if(!$this->validateHash($dto->hash, $user)){
            throw new InvalidEmailVerificationDataException();
        }

        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();

            $user->notify(new EmailVerified());
        }
    }

    /**
     * Compare is user provided email hash is correct
     *
     * @param string $providedHash User provided hash to check
     * @param UserModel $user User to check email hash with
     * @return bool Is hashes equal
     */
    private function validateHash(string $providedHash, UserModel $user): bool
    {
        return hash_equals(
            $providedHash,
            app(HashEmailTask::class)->run($user->getEmailForVerification())
        );
    }
}
