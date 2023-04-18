<?php

namespace App\GraphQL\Queries\Claim;

use App\Claim\Entity\Claim;
use App\User\Entity\User;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class ClaimsQuery
{
    public function __invoke($root, array $args, GraphQLContext $context)
    {
        /** @var User $user */
        $user = $context->request()->user();

        if ($user->role == User::ROLE_ADMIN) {
            return Claim::
            orderBy('id', 'DESC')->get();
        }

        return $user->claims()
            ->orderBy('id', 'DESC')->get();
    }
}
