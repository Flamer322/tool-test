<?php

namespace App\Claim\Command\Create;

use Spatie\LaravelData\Data;

final class Command extends Data
{
    public function __construct(
        public string $name,
        public string $number,
        public array  $files,
    )
    {
    }
}
