<?php

namespace App\Containers\AppSection\Lesson\UI\API\Transformers;

use App\Containers\AppSection\Lesson\Models\LessonMaterial;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class LessonMaterialTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(LessonMaterial $lessonMaterial): array
    {
        $response = [
            'object' => $lessonMaterial->getResourceKey(),
            'id' => $lessonMaterial->getHashedKey(),
            'content' => $lessonMaterial->content,
            'lesson_id' => $lessonMaterial->lesson_id
        ];

        return $this->ifAdmin([
            'real_id' => $lessonMaterial->id,
            'created_at' => $lessonMaterial->created_at,
            'updated_at' => $lessonMaterial->updated_at,
            'readable_created_at' => $lessonMaterial->created_at->diffForHumans(),
            'readable_updated_at' => $lessonMaterial->updated_at->diffForHumans()
        ], $response);
    }
}
