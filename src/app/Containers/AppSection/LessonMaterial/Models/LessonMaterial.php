<?php

namespace App\Containers\AppSection\LessonMaterial\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class LessonMaterial extends ParentModel
{
    protected $fillable = [
        'content',
        'course_id'
    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'LessonMaterial';
}
