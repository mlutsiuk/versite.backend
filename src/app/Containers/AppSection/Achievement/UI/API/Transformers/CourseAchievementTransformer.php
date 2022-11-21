<?php

namespace App\Containers\AppSection\Achievement\UI\API\Transformers;

use App\Containers\AppSection\Achievement\Models\CourseAchievement;
use App\Containers\AppSection\Course\UI\API\Transformers\CourseTransformer;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;
use League\Fractal\Resource\Item;

class CourseAchievementTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [
        'course'
    ];

    public function transform(CourseAchievement $courseAchievement): array
    {
        $response = [
            'object' => $courseAchievement->getResourceKey(),
            'id' => $courseAchievement->getHashedKey(),
            'title' => $courseAchievement->title,
            'description' => $courseAchievement->description,
            'title_color' => $courseAchievement->title_color,
            'description_color' => $courseAchievement->description_color,
            'border_color' => $courseAchievement->border_color
        ];

        return $this->ifAdmin([
            'real_id' => $courseAchievement->id,
            'created_at' => $courseAchievement->created_at,
            'updated_at' => $courseAchievement->updated_at,
            'readable_created_at' => $courseAchievement->created_at->diffForHumans(),
            'readable_updated_at' => $courseAchievement->updated_at->diffForHumans(),
            // 'deleted_at' => $achievement->deleted_at,
        ], $response);
    }

    public function includeCourse(CourseAchievement $courseAchievement): Item
    {
        return $this->item($courseAchievement->course, new CourseTransformer());
    }
}
