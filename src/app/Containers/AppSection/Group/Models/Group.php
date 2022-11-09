<?php

namespace App\Containers\AppSection\Group\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class Group extends ParentModel
{
    protected $fillable = [
        'title',
        'course_id',
        'registration_start',
        'registration_end'
    ];

    protected $hidden = [

    ];

    protected $casts = [
        'registration_start' => 'timestamp',
        'registration_end' => 'timestamp'
    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Group';
}
