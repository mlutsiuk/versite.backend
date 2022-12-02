<?php

namespace App\Containers\AppSection\Lesson\UI\API\Transformers;

use App\Containers\AppSection\Group\UI\API\Transformers\GroupTransformer;
use App\Containers\AppSection\Lesson\Models\Lesson;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;
use League\Fractal\Resource\Item;

class LessonTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [
        'group',
//        'material'    // TODO
    ];

    public function transform(Lesson $lesson): array
    {
        $response = [
            'object' => $lesson->getResourceKey(),
            'id' => $lesson->getHashedKey(),
            'title' => $lesson->title,
            'group_id' => $lesson->group_id,
            'open_at' => $lesson->open_at,
        ];

        return $this->ifAdmin([
            'real_id' => $lesson->id,
            'created_at' => $lesson->created_at,
            'updated_at' => $lesson->updated_at,
            'readable_created_at' => $lesson->created_at->diffForHumans(),
            'readable_updated_at' => $lesson->updated_at->diffForHumans(),
            // 'deleted_at' => $lesson->deleted_at,
        ], $response);
    }

    public function includeGroup(Lesson $lesson): Item
    {
        return $this->item($lesson->group, new GroupTransformer());
    }

//    public function includeMaterial(Lesson $lesson): Item
//    {
//        return $this->item($lesson->material, new MaterialTransformer());
//    }
}
