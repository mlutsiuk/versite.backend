<?php

namespace App\Containers\AppSection\Student\UI\API\Transformers;

use App\Containers\AppSection\Course\UI\API\Transformers\CourseTransformer;
use App\Containers\AppSection\Invitation\UI\API\Transformers\InvitationTransformer;
use App\Containers\AppSection\Student\Models\Student;
use App\Containers\AppSection\User\UI\API\Transformers\UserTransformer;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;
use League\Fractal\Resource\Item;

class StudentTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [
        'course',
        'user',
        'invitation'
    ];

    public function transform(Student $student): array
    {
        $response = [
            'object' => $student->getResourceKey(),
            'id' => strval($student->getHashedKey()),
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

    public function includeCourse(Student $student): Item
    {
        return $this->item($student->course, new CourseTransformer());
    }

    public function includeUser(Student $student)
    {
        if($student->user) {
            return $this->item($student->user, new UserTransformer());
        }
    }

    public function includeInvitation(Student $student)
    {
        if($student->invitation) {
            return $this->item($student->invitation, new InvitationTransformer());
        }
    }
}
