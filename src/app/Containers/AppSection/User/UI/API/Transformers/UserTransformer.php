<?php

namespace App\Containers\AppSection\User\UI\API\Transformers;

use App\Containers\AppSection\Achievement\UI\API\Transformers\UserAchievementTransformer;
use App\Containers\AppSection\Authorization\UI\API\Transformers\PermissionTransformer;
use App\Containers\AppSection\Authorization\UI\API\Transformers\RoleTransformer;
use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;
use League\Fractal\Resource\Collection;

class UserTransformer extends ParentTransformer
{
    protected array $availableIncludes = [
        'roles',
        'permissions',
        'achievements'
    ];

    protected array $defaultIncludes = [

    ];

    public function transform(User $user): array
    {
        $response = [
            'object' => $user->getResourceKey(),
            'id' => $user->getHashedKey(),
            'name' => $user->name,
            'nickname' => $user->nickname,
            'email' => $user->email,
            'avatar' => $user->avatar,
            'email_verified_at' => $user->email_verified_at
        ];

        return $this->ifAdmin([
            'real_id' => $user->id,
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at,
            'readable_created_at' => $user->created_at->diffForHumans(),
            'readable_updated_at' => $user->updated_at->diffForHumans(),
        ], $response);
    }

    public function includeRoles(User $user): Collection
    {
        return $this->collection($user->roles, new RoleTransformer());
    }

    public function includePermissions(User $user): Collection
    {
        return $this->collection($user->permissions, new PermissionTransformer());
    }

    public function includeAchievements(User $user): Collection
    {
        return $this->collection($user->achievements, new UserAchievementTransformer());
    }
}
