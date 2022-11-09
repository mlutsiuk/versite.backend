<?php

namespace App\Containers\AppSection\Course\UI\API\Transformers;

use App\Containers\AppSection\Course\Models\Course;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class CourseTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(Course $course): array
    {
        $response = [
            'object' => $course->getResourceKey(),
            'id' => $course->getHashedKey(),
            'slug' => $course->slug,
            'title' => $course->title,
            'description' => $course->description
        ];

        return $this->ifAdmin([
            'real_id' => $course->id,
            'created_at' => $course->created_at,
            'updated_at' => $course->updated_at,
            'readable_created_at' => $course->created_at->diffForHumans(),
            'readable_updated_at' => $course->updated_at->diffForHumans(),
            'deleted_at' => $course->deleted_at,
        ], $response);
    }
}
