<?php

declare(strict_types=1);

namespace Showcase\Custody;

final readonly class OutboxRecord
{
    public function __construct(
        public string $externalEventId,
        public string $operationType,
        public string $status,
        public int $attempts,
        public ?string $lastErrorCode,
    ) {}
}
