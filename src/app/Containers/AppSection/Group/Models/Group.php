<?php

namespace App\Containers\AppSection\Group\Models;

use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Group extends ParentModel
{
    protected $fillable = [
        'title',
        'course_id',
        'registration_start',
        'registration_end'
    ];

    protected $hidden = [

    ];

    protected $casts = [
        'registration_start' => 'timestamp',
        'registration_end' => 'timestamp'
    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Group';

    /**
     * Group members(students), many-to-many relations.
     *
     * @return BelongsToMany
     */
    public function members(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'group_members',
            'id',
            'id'
        );
    }
}
