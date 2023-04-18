<?php

declare(strict_types=1);

namespace App\GraphQL\Validators\Auth;

use Nuwave\Lighthouse\Validation\Validator;

final class SignUpValidator extends Validator
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max: 255'],
            'email' => ['required', 'email', 'unique:App\User\Entity\User,email', 'max:255'],
            'password' => ['required', 'min:6', 'max:255'],
        ];
    }
}
