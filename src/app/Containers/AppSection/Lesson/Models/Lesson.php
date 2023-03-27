<?php

namespace App\Containers\AppSection\Lesson\Models;

use App\Containers\AppSection\Course\Models\Course;
use App\Containers\AppSection\Group\Models\Group;
use App\Containers\AppSection\LessonMaterial\Models\LessonMaterial;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Lesson extends ParentModel
{
    protected $fillable = [
        'title',
        'date',
        'course_id'
    ];

    protected $hidden = [

    ];

    protected $casts = [
        'date' => 'timestamp'
    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Lesson';

    /**
     * Lesson course, many-to-one relation.
     *
     * @return BelongsTo
     */
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }

// TODO
//    public function material(): HasOne
//    {
//        return $this->hasOne(LessonMaterial::class, 'id', 'material_id');
//    }
}
