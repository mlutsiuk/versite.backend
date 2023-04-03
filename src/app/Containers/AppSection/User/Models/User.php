<?php

namespace App\Containers\AppSection\User\Models;

use App\Containers\AppSection\Authorization\Traits\AuthorizationTrait;
use App\Containers\AppSection\Course\Models\Course;
use App\Ship\Parents\Models\UserModel as ParentUserModel;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Validation\Rules\Password;
use Str;

class User extends ParentUserModel implements MustVerifyEmail
{
    use AuthorizationTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'nickname',
        'email',
        'avatar',
        'password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime'
    ];

    public static function getPasswordValidationRules(): Password
    {
        return Password::min(8);
    }

    protected function email(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => Str::lower($value)
        );
    }

    public function authoredCourses(): HasMany
    {
        return $this->hasMany(Course::class, 'author_id');
    }
}
