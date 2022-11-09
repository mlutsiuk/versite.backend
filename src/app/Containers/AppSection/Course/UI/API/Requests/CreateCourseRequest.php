<?php

namespace App\Containers\AppSection\Course\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class CreateCourseRequest extends ParentRequest
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
        // 'id',
    ];

    /**
     * Defining the URL parameters (e.g, `/user/{id}`) allows applying
     * validation rules on them and allows accessing them like request data.
     */
    protected array $urlParameters = [
        // 'id',
    ];

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'slug' => [
                'required',
                'string',
                'min:4',
                'max:32',
                'unique:courses,slug'
            ],
            'title' => [
                'required',
                'string',
                'min:4',
                'max:32'
            ],
            'description' => [
                'required',
                'string',
                'min:15',
                'max:100'
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