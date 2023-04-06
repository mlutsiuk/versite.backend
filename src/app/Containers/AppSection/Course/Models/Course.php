<?php

namespace App\Containers\AppSection\Course\Models;

use App\Containers\AppSection\Lesson\Models\Lesson;
use App\Containers\AppSection\Student\Models\Student;
use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Course extends ParentModel
{
    protected $fillable = [
        'title',
        'description',
        'author_id'
    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Course';

    /**
     * Course students, one-to-many relations
     *
     * @return HasMany
     */
    public function students(): HasMany
    {
        return $this->hasMany(Student::class, 'course_id','id');
    }

    /**
     * Course lessons, one-to-many relations
     *
     * @return HasMany
     */
    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class, 'course_id');
    }

    /**
     * Course lessons, one-to-many relations
     */
    public function nextLesson(): HasOne
    {
        return $this->hasOne(Lesson::class, 'course_id')
            ->where('date', '>', now())
            ->orderBy('date');
    }

    /**
     * Course author, many-to-one relations
     *
     * @return BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
