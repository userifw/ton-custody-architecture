<?php

declare(strict_types=1);

namespace Showcase\Custody;

final readonly class CustodyOperation
{
    public function __construct(
        public string $publicId,
        public string $idempotencyKey,
        public string $network,
        public string $asset,
        public string $amountAtomic,
        public string $status,
        public ?string $externalOperationId,
    ) {}
}
