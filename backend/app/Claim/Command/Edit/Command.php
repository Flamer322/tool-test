<?php

namespace App\Claim\Command\Edit;

use Spatie\LaravelData\Data;

final class Command extends Data
{
    public function __construct(
        public int $id,
        public string $name,
        public string $number,
        public ?array $files = [],
    )
    {
    }
}
