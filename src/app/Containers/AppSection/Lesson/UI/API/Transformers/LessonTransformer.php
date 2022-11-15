<?php

namespace App\Containers\AppSection\Lesson\UI\API\Transformers;

use App\Containers\AppSection\Lesson\Models\Lesson;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class LessonTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(Lesson $lesson): array
    {
        $response = [
            'object' => $lesson->getResourceKey(),
            'id' => $lesson->getHashedKey(),
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
}
