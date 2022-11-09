<?php

namespace App\Containers\AppSection\Invitation\Models;

use App\Containers\AppSection\Group\Models\Group;
use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invitation extends ParentModel
{
    protected $fillable = [
        'receiver_id',
        'group_id',
        'is_accepted'
    ];

    protected $hidden = [

    ];

    protected $casts = [
        'is_accepted' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Invitation';

    public function receiver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'receiver_id', 'id');
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }
}
