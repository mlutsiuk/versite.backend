<?php

namespace App\Containers\AppSection\Student\UI\API\Transformers;

use App\Containers\AppSection\Student\Models\Student;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class StudentTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(Student $student): array
    {
        $response = [
            'object' => $student->getResourceKey(),
            'id' => $student->getHashedKey(),
            'name' => $student->name,
            'course_id' => $student->course_id,
            'user_id' => $student->user_id
        ];

        return $this->ifAdmin([
            'real_id' => $student->id,
            'created_at' => $student->created_at,
            'updated_at' => $student->updated_at,
            'readable_created_at' => $student->created_at->diffForHumans(),
            'readable_updated_at' => $student->updated_at->diffForHumans(),
            // 'deleted_at' => $student->deleted_at,
        ], $response);
    }
}
