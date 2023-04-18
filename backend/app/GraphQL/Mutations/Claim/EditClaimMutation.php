<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations\Claim;

use App\Claim\Command\Edit;
use Exception;
use Nuwave\Lighthouse\Exceptions\DefinitionException;
use Psr\Log\LoggerInterface;

final class EditClaimMutation
{
    public function __construct(
        private Edit\Handler $handler,
        private LoggerInterface $logger
    ) {
    }

    public function __invoke($_, array $args): array
    {
        try {
            $this->handler->handle(
                Edit\Command::from($args['input']),
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
