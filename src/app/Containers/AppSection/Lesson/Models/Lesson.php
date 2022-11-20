<?php

namespace App\Containers\AppSection\Lesson\Models;

use App\Containers\AppSection\Group\Models\Group;
use App\Containers\AppSection\LessonMaterial\Models\LessonMaterial;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Lesson extends ParentModel
{
    protected $fillable = [
        'title',
        'group_id',
        'material_id',
        'open_at'
    ];

    protected $hidden = [

    ];

    protected $casts = [
        'open_at' => 'timestamp'
    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Lesson';

    /**
     * Lesson group, many-to-one relation.
     *
     * @return BelongsTo
     */
    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }

    public function material(): HasOne
    {
        return $this->hasOne(LessonMaterial::class, 'id', 'material_id');
    }
}
