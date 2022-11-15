<?php

namespace App\Containers\AppSection\Lesson\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class CreateLessonRequest extends ParentRequest
{
    /**
     * Define which Roles and/or Permissions has access to this request.
     */
    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'string',
                'min:1',
                'max:150'
            ],
            'group_id' => [
                'required',
                'exists:groups,id'
            ],
            'open_at' => [
                'required',
                'date'
            ]
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
