<?php

namespace App\Containers\AppSection\Invitation\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class InvitationRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
