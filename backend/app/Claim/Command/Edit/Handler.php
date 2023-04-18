<?php

declare(strict_types=1);

namespace App\Claim\Command\Edit;

use App\Claim\Entity\Claim;
use App\Claim\Repository\ClaimRepository;
use Illuminate\Support\Facades\Log;

final class Handler
{
    public function __construct(
        private readonly ClaimRepository $claims,
    ) {
    }

    public function handle(Command $command): void
    {
        $claim = $this->claims->findById($command->id);

        $claim->name = $command->name;
        $claim->number = $command->number;

        $this->claims->save($claim);

        foreach ($command->files as $file) {
            Log::error('file');

            $claim->addMedia($file)
                ->toMediaCollection(Claim::MEDIA_COLLECTION);
        }
    }
}
