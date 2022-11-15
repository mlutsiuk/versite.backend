<?php

namespace App\Containers\AppSection\Lesson\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class Lesson extends ParentModel
{
    protected $fillable = [
        'title',
        'group_id',
        'open_at'
    ];

    protected $hidden = [

    ];

    protected $casts = [
        'open_at' => 'timestamp'
    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Lesson';
}
