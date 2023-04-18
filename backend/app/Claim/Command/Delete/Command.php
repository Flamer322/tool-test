<?php

namespace App\Claim\Command\Delete;

use Spatie\LaravelData\Data;

final class Command extends Data
{
    public function __construct(
        public int $id,
    )
    {
    }
}
