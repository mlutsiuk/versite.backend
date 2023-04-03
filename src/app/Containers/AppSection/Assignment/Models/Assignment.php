<?php

namespace App\Containers\AppSection\Assignment\Models;

use App\Containers\AppSection\Lesson\Models\Lesson;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
