<?php

declare(strict_types=1);

namespace App\Claim\Policies;

use App\Claim\Entity\Claim;
use App\User\Entity\User;
use Illuminate\Auth\Access\HandlesAuthorization;

final class ClaimPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Claim $claim): bool
    {
        return ($claim->user->id == $user->id
            || $user->role == User::ROLE_ADMIN);
    }

    public function delete(User $user, Claim $claim): bool
    {
        return ($claim->user->id == $user->id
            || $user->role == User::ROLE_ADMIN);
    }
}
