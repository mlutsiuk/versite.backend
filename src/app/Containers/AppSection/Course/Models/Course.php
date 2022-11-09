<?php

namespace App\Containers\AppSection\Course\Models;

use App\Containers\AppSection\Group\Models\Group;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends ParentModel
{
    protected $fillable = [
        'slug',
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
     * Course groups, one-to-many relations
     *
     * @return HasMany
     */
    public function groups(): HasMany
    {
        return $this->hasMany(Group::class, 'course_id','id');
    }
}
