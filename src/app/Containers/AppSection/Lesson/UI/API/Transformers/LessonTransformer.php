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
        'course',
//        'material'    // TODO
    ];

    public function transform(Lesson $lesson): array
    {
        $response = [
            'object' => $lesson->getResourceKey(),
            'id' => $lesson->getHashedKey(),
            'title' => $lesson->title,
            'course_id' => $lesson->course_id,
            'date' => $lesson->date,
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

// TODO
//    public function includeCourse(Lesson $lesson): Item
//    {
//        return $this->item($lesson->course, new GroupTransformer());
//    }

// TODO
//    public function includeMaterial(Lesson $lesson): Item
//    {
//        return $this->item($lesson->material, new MaterialTransformer());
//    }
}
