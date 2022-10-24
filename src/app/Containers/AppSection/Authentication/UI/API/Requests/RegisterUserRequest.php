<?php

namespace App\Containers\AppSection\Authentication\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class RegisterUserRequest extends ParentRequest
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
            // TODO: Review length
            'name' => 'required|string|min:2|max:32',

            // TODO: Review length, github-style-nickname, lowercase before validation?
            'nickname' => 'required|unique:users,nickname|min:2|max:32',

            // TODO: lowercase before validation
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8|max:64'
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
