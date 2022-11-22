<?php

namespace App\Containers\AppSection\Achievement\UI\API\Transformers;

use App\Containers\AppSection\Achievement\Models\UserAchievement;
use App\Containers\AppSection\User\UI\API\Transformers\UserTransformer;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;
use League\Fractal\Resource\Item;

class UserAchievementTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [
        'user',
        'course_achievement'
    ];

    public function transform(UserAchievement $userAchievement): array
    {
        $response = [
            'object' => $userAchievement->getResourceKey(),
            'id' => $userAchievement->getHashedKey(),
            'user_id' => $userAchievement->user_id,
            'course_achievement_id' => $userAchievement->course_achievement_id
        ];

        return $this->ifAdmin([
            'real_id' => $userAchievement->id,
            'created_at' => $userAchievement->created_at,
            'updated_at' => $userAchievement->updated_at,
            'readable_created_at' => $userAchievement->created_at->diffForHumans(),
            'readable_updated_at' => $userAchievement->updated_at->diffForHumans(),
            // 'deleted_at' => $userAchievement->deleted_at,
        ], $response);
    }

    public function includeUser(UserAchievement $userAchievement): Item
    {
        return $this->item($userAchievement->user, new UserTransformer());
    }

    public function includeCourseAchievement(UserAchievement $userAchievement): Item
    {
        return $this->item($userAchievement->course_achievement, new CourseAchievementTransformer());
    }
}
