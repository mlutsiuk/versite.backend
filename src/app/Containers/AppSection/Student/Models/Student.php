<?php

namespace App\Containers\AppSection\Student\Models;

use App\Containers\AppSection\Assignment\Models\AssignmentSubmission;
use App\Containers\AppSection\Course\Models\Course;
use App\Containers\AppSection\Invitation\Models\Invitation;
use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Student extends ParentModel
{
    protected $fillable = [
        'name',
        'course_id',
        'user_id'
    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Student';

    /**
     * Student course, many-to-one relation.
     *
     * @return BelongsTo
     */
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }

    /**
     * Student actual user, many-to-one relation.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


    /**
     * Student assignment submissions, one-to-many relation.
     *
     * @return HasMany
     */
    public function assignmentSubmissions(): HasMany
    {
        return $this->hasMany(AssignmentSubmission::class, 'student_id', 'id');
    }

    /**
     * Invitation to student account, one-to-one relation.
     *
     * @return HasOne
     */
    public function invitation(): HasOne
    {
        return $this->hasOne(Invitation::class, 'student_id', 'id');
    }
}
