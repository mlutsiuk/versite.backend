<?php

namespace App\Containers\AppSection\LessonMaterial\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class UpdateLessonMaterialRequest extends ParentRequest
{
    /**
     * Define which Roles and/or Permissions has access to this request.
     */
    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    /**
     * Id's that needs decoding before applying the validation rules.
     */
    protected array $decode = [
        'lessonId',
    ];

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'content' => 'required|string'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
