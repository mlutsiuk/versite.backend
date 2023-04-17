<?php

namespace App\Containers\AppSection\Lesson\Models;

use App\Containers\AppSection\Assignment\Models\Assignment;
use App\Containers\AppSection\Course\Models\Course;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
        'date' => 'datetime'
    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Lesson';

    /**
     * Lesson course, many-to-one relations
     *
     * @return BelongsTo
     */
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }

    /**
     * Material lesson, one-to-one relations
     *
     * @return HasOne
     */
    public function material(): HasOne
    {
        return $this->hasOne(LessonMaterial::class, 'lesson_id', 'id');
    }

    /**
     * Lesson assignments, one-to-many relations
     *
     * @return HasMany
     */
    public function assignments(): HasMany
    {
        return $this->hasMany(Assignment::class, 'lesson_id');
    }
}
