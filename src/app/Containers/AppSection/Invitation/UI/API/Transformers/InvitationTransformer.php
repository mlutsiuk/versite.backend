<?php

namespace App\Containers\AppSection\Invitation\UI\API\Transformers;

use App\Containers\AppSection\Invitation\Models\Invitation;
use App\Containers\AppSection\Student\UI\API\Transformers\StudentTransformer;
use App\Containers\AppSection\User\UI\API\Transformers\UserTransformer;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;
use League\Fractal\Resource\Item;

class InvitationTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [
        'receiver',
        'group'
    ];

    public function transform(Invitation $invitation): array
    {
        $response = [
            'object' => $invitation->getResourceKey(),
            'id' => $invitation->getHashedKey(),
            'receiver_id' => $invitation->receiver_id,
            'student_id' => $invitation->student_id,
            'email' => $invitation->email,
            'is_hidden' => $invitation->is_hidden
        ];

        return $this->ifAdmin([
            'real_id' => $invitation->id,
            'created_at' => $invitation->created_at,
            'updated_at' => $invitation->updated_at,
            'readable_created_at' => $invitation->created_at->diffForHumans(),
            'readable_updated_at' => $invitation->updated_at->diffForHumans(),
            // 'deleted_at' => $invitation->deleted_at,
        ], $response);
    }

    public function includeReceiver(Invitation $invitation): Item
    {
        return $this->item($invitation->receiver, new UserTransformer());
    }

    public function includeGroup(Invitation $invitation): Item
    {
        return $this->item($invitation->student, new StudentTransformer());
    }
}
