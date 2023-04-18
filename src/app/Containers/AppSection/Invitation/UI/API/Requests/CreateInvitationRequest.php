<?php

namespace App\Containers\AppSection\Invitation\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;
use Str;

class CreateInvitationRequest extends ParentRequest
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

    ];

    /**
     * Defining the URL parameters (e.g, `/user/{id}`) allows applying
     * validation rules on them and allows accessing them like request data.
     */
    protected array $urlParameters = [

    ];

    public function all($keys = null): array
    {
        $data = parent::all($keys);

        if(!empty($data['email'])) {
            $data['email'] = Str::lower($data['email']);
        }

        return $data;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'student_id' => 'required|exists:students,id',
            'email' => 'required|email'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
            // TODO: Url students/invitation
            // TODO: Course teacher
            // TODO: Can create invitations
        ]);
    }
}
