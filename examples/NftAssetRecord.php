<?php

declare(strict_types=1);

namespace Showcase\DigitalAssets;

final readonly class NftAssetRecord
{
    public function __construct(
        public string $network,
        public string $collectionAddress,
        public string $itemIndex,
        public string $nftAddress,
        public string $ownerAddress,
        public string $metadataUri,
        public string $syncStatus,
        public ?string $transactionId,
    ) {}
}
