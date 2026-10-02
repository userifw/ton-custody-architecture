<?php

declare(strict_types=1);

namespace Showcase\DigitalAssets;

final readonly class DexSwapOperation
{
    public function __construct(
        public string $publicId,
        public string $idempotencyKey,
        public string $network,
        public string $inputAsset,
        public string $outputAsset,
        public string $inputAtomic,
        public string $minimumOutputAtomic,
        public int $slippageBps,
        public string $quoteExpiresAt,
        public string $status,
        public ?string $externalOperationId,
    ) {}
}
