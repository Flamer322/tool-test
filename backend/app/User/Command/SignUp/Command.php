<?php

namespace App\User\Command\SignUp;

use App\User\Entity\User;
use Spatie\LaravelData\Data;

final class Command extends Data
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
        public string $role = User::ROLE_CLIENT,
    )
    {
    }
}
