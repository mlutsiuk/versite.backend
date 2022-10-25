<?php

namespace App\Containers\AppSection\Authorization\Traits;

use Spatie\Permission\Traits\HasRoles;

trait AuthorizationTrait
{
    use HasRoles;

    public function hasAdminRole(): bool
    {
        return $this->hasRole(config('appSection-authorization.admin_role'));
    }
}
