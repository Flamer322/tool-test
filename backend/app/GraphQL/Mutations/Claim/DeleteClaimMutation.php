<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations\Claim;

use App\Claim\Command\Delete;
use Exception;
use Nuwave\Lighthouse\Exceptions\DefinitionException;
use Psr\Log\LoggerInterface;

final class DeleteClaimMutation
{
    public function __construct(
        private Delete\Handler $handler,
        private LoggerInterface $logger
    ) {
    }

    public function __invoke($_, array $args): array
    {
        try {
            $this->handler->handle(
                Delete\Command::from($args),
            );
        } catch (Exception $e) {
            $this->logger->error($e);
            throw new DefinitionException($e->getMessage());
        }

        return [
            'success' => true,
        ];
    }
}
