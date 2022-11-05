<?php

namespace App\Containers\AppSection\Course\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class Course extends ParentModel
{
    protected $fillable = [
        'slug',
        'title',
        'description'
    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Course';
}
