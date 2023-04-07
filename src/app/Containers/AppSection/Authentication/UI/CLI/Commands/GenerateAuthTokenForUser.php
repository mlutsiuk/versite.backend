<?php

namespace App\Containers\AppSection\Authentication\UI\CLI\Commands;

use App\Containers\AppSection\Authentication\Tasks\CreateAccessTokenForAuthenticatedUserTask;
use App\Containers\AppSection\User\Tasks\FindUserByIdTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Commands\ConsoleCommand;
use Auth;

class GenerateAuthTokenForUser extends ConsoleCommand
{
    protected $signature = 'auth:generate-token {user-id : Id of target user}';

    protected $description = 'Generate access-token for by user id';

    public function handle() {
        $userId = $this->argument('user-id');

        if(empty($userId)) {
            $this->error('user-id param is required');
        }


        try {
            $user = app(FindUserByIdTask::class)->run($userId);

            $this->info("User:  <fg=blue>[$userId] $user->name</fg=blue> found");
        } catch (NotFoundException $e) {
            $this->error("User with id $userId is not found");
            return;
        }

        Auth::guard('web')->loginUsingId($userId);

        $accessToken = app(CreateAccessTokenForAuthenticatedUserTask::class)->run();

        $this->line("Access token:\n$accessToken");
    }
}
