<?php

namespace App\Containers\AppSection\Assignment\Models;

use App\Containers\AppSection\Lesson\Models\Lesson;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Assignment extends ParentModel
{
    protected $fillable = [
        'title',
        'description',
        'max_mark',
        'deadline',
        'lesson_id'
    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Assignment';

    /**
     * Assignment lesson, many-to-one relations
     *
     * @return BelongsTo
     */
    public function lesson(): BelongsTo
    {
        return $this->belongsTo(Lesson::class);
    }

    /**
     * Assignment submissions, one-to-one relations
     *
     * @return HasOne
     */
    public function mySubmission(): HasOne
    {
        return $this->hasOne(AssignmentSubmission::class, 'assignment_id', 'id')
            ->whereHas('student', function ($query) {
                $query->where('user_id', auth()->id());
            });
    }

    /**
     * Assignment submissions, one-to-many relations
     *
     * @return HasMany
     */
    public function submissions(): HasMany
    {
        return $this->hasMany(AssignmentSubmission::class, 'assignment_id', 'id');
    }
}
