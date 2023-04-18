<?php

namespace App\User\Command\Create;

use App\User\Entity\User;
use Illuminate\Validation\Rule;
use Spatie\LaravelData\Data;

final class Command extends Data
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
        public string $role
    )
    {
    }

    public static function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max: 255'],
            'email' => ['required', 'email', 'unique:App\User\Entity\User,email', 'max:255'],
            'password' => ['required', 'min:6', 'max:255'],
            'role' => ['required', 'string', 'max: 30', Rule::in([User::ROLE_ADMIN, User::ROLE_CLIENT])],
        ];
    }
}
