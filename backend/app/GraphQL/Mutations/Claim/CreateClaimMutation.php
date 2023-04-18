<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations\Claim;

use App\Claim\Command\Create;
use Exception;
use Nuwave\Lighthouse\Exceptions\DefinitionException;
use Psr\Log\LoggerInterface;

final class CreateClaimMutation
{
    public function __construct(
        private Create\Handler $handler,
        private LoggerInterface $logger
    ) {
    }

    public function __invoke($_, array $args): array
    {
        try {
            $claim = $this->handler->handle(
                Create\Command::from($args['input']),
                request()->user()->id
            );
        } catch (Exception $e) {
            $this->logger->error($e);
            throw new DefinitionException($e->getMessage());
        }

        return [
            'id' => $claim->id,
        ];
    }
}
