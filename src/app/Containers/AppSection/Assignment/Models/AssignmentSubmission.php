<?php

namespace App\Containers\AppSection\Assignment\Models;

use App\Containers\AppSection\Student\Models\Student;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AssignmentSubmission extends ParentModel
{
    protected $fillable = [
        'assignment_id',
        'student_id',
        'content',
        'mark',
        'is_checked'
    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'AssignmentSubmission';

    /**
     * Submission student, many-to-one relations
     *
     * @return BelongsTo
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * Submission assignment, many-to-one relations
     *
     * @return BelongsTo
     */
    public function assignment(): BelongsTo
    {
        return $this->belongsTo(Assignment::class);
    }
}
