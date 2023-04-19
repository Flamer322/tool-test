<?php

declare(strict_types=1);

namespace App\Claim\Command\Create;

use App\Claim\Entity\Claim;
use App\Claim\Repository\ClaimRepository;
use App\User\Repository\UserRepository;

final class Handler
{
    public function __construct(
        private readonly ClaimRepository $claims,
        private readonly UserRepository $users,
    ) {
    }

    public function handle(Command $command, int $userId): Claim
    {
        $claim = new Claim([
            'name' => $command->name,
            'number' => $command->number,
        ]);

        $claim->user()->associate(
            $this->users->findById($userId)
        );

        $this->claims->save($claim);

        foreach ($command->files as $file) {
            $claim->addMedia($file)
                ->toMediaCollection(Claim::MEDIA_COLLECTION);
        }

        return $claim;
    }
}
