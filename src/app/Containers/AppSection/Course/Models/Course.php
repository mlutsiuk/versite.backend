<?php

namespace App\Containers\AppSection\Course\Models;

use App\Containers\AppSection\Student\Models\Student;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
}
