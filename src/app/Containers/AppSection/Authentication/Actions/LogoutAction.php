<?php

namespace App\Containers\AppSection\Authentication\Actions;

use App\Ship\Parents\Actions\Action as ParentAction;
use Illuminate\Support\Facades\Auth;

class LogoutAction extends ParentAction
{
    /**
     * Logout user (revoke current access token)
     *
     * @return void
     */
    public function run(): void
    {
        $currentToken = Auth::user()->token();
        $currentToken->revoke();
    }
}
