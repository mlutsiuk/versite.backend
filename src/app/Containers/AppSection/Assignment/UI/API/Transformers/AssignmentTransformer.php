<?php

namespace App\Containers\AppSection\Assignment\UI\API\Transformers;

use App\Containers\AppSection\Assignment\Models\Assignment;
use App\Containers\AppSection\Lesson\UI\API\Transformers\LessonTransformer;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

class AssignmentTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [
        'lesson',
        'my_submission',
        'submissions'
    ];

    public function transform(Assignment $assignment): array
    {
        $response = [
            'object' => $assignment->getResourceKey(),
            'id' => strval($assignment->getHashedKey()),
            'title' => $assignment->title,
            'description' => $assignment->description,
            'max_mark' => $assignment->max_mark,
            'deadline' => $assignment->deadline,
            'lesson_id' => $assignment->lesson_id
        ];

        return $this->ifAdmin([
            'real_id' => $assignment->id,
            'created_at' => $assignment->created_at,
            'updated_at' => $assignment->updated_at,
            'readable_created_at' => $assignment->created_at->diffForHumans(),
            'readable_updated_at' => $assignment->updated_at->diffForHumans(),
            // 'deleted_at' => $assignment->deleted_at,
        ], $response);
    }

    public function includeLesson(Assignment $assignment): Item
    {
        return $this->item($assignment->lesson, new LessonTransformer());
    }

    public function includeMySubmission(Assignment $assignment)
    {
        if($assignment->mySubmission) {
            return $this->item($assignment->mySubmission, new AssignmentSubmissionTransformer());
        }
    }

    public function includeSubmissions(Assignment $assignment): Collection
    {
        return $this->collection($assignment->submissions, new AssignmentSubmissionTransformer());
    }
}
