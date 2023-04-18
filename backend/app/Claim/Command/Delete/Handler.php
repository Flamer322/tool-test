<?php

declare(strict_types=1);

namespace App\Claim\Command\Delete;

use App\Claim\Repository\ClaimRepository;

final class Handler
{
    public function __construct(
        private readonly ClaimRepository $claims,
    ) {
    }

    public function handle(Command $command): void
    {
        $claim = $this->claims->findById($command->id);

        $this->claims->delete($claim);
    }
}
