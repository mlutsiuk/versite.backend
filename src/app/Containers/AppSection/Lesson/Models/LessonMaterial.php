<?php

namespace App\Containers\AppSection\Lesson\Models;

use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\HasOne;

class LessonMaterial extends ParentModel
{
    protected $fillable = [
        'content',
        'lesson_id'
    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'LessonMaterial';

    /**
     * Lesson material, one-to-one relation
     *
     * @return HasOne
     */
    public function lesson(): HasOne
    {
        return $this->hasOne(Lesson::class, 'lesson_id', 'id');
    }
}
