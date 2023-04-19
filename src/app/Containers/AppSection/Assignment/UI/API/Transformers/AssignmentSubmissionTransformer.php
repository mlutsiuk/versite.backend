<?php

namespace App\Containers\AppSection\Assignment\UI\API\Transformers;

use App\Containers\AppSection\Assignment\Models\AssignmentSubmission;
use App\Containers\AppSection\Student\UI\API\Transformers\StudentTransformer;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;
use League\Fractal\Resource\Item;

class AssignmentSubmissionTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [
        'lesson'
    ];

    public function transform(AssignmentSubmission $submission): array
    {
        $response = [
            'object' => $submission->getResourceKey(),
            'id' => $submission->getHashedKey(),
            'assignment_id' => $submission->assignment_id,
            'student_id' => $submission->student_id,
            'content' => $submission->content,
            'mark' => $submission->mark,
            'is_checked' => $submission->is_checked
        ];

        return $this->ifAdmin([
            'real_id' => $submission->id,
            'created_at' => $submission->created_at,
            'updated_at' => $submission->updated_at,
            'readable_created_at' => $submission->created_at->diffForHumans(),
            'readable_updated_at' => $submission->updated_at->diffForHumans(),
            // 'deleted_at' => $submission->deleted_at,
        ], $response);
    }

    public function includeStudent(AssignmentSubmission $submission): Item
    {
        return $this->item($submission->student, new StudentTransformer());
    }

    public function includeAssignment(AssignmentSubmission $submission): Item
    {
        return $this->item($submission->assignment, new AssignmentTransformer());
    }
}
