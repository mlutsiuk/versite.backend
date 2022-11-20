<?php

namespace App\Containers\AppSection\LessonMaterial\UI\API\Transformers;

use App\Containers\AppSection\LessonMaterial\Models\LessonMaterial;
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
            'course_id' => $lessonMaterial->course_id
        ];

        return $this->ifAdmin([
            'real_id' => $lessonMaterial->id,
            'created_at' => $lessonMaterial->created_at,
            'updated_at' => $lessonMaterial->updated_at,
            'readable_created_at' => $lessonMaterial->created_at->diffForHumans(),
            'readable_updated_at' => $lessonMaterial->updated_at->diffForHumans(),
            // 'deleted_at' => $lessonmaterial->deleted_at,
        ], $response);
    }
}
