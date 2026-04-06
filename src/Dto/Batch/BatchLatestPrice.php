<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Batch;

use MarekSkopal\TwelveData\Dto\CoreData\LatestPrice;

/**
 * @phpstan-import-type LatestPriceType from LatestPrice
 * @phpstan-type BatchErrorType array{code: int, message: string, status: string}
 */
readonly class BatchLatestPrice
{
    /**
     * @param array<string, LatestPrice> $items
     * @param array<string, BatchItemError> $errors
     */
    public function __construct(public array $items, public array $errors = [])
    {
    }

    public static function fromJson(string $json): self
    {
        /** @var LatestPriceType|array<string, LatestPriceType|BatchErrorType> $responseContents */
        $responseContents = json_decode($json, associative: true);

        // Single-symbol response has 'price' at top level
        if (isset($responseContents['price']) && is_string($responseContents['price'])) {
            /** @var LatestPriceType $singleResponse */
            $singleResponse = $responseContents;

            return new self(items: ['default' => LatestPrice::fromArray($singleResponse)]);
        }

        $items = [];
        $errors = [];

        /** @var array<string, LatestPriceType|BatchErrorType> $batchContents */
        $batchContents = $responseContents;
        foreach ($batchContents as $key => $value) {
            if (isset($value['status']) && $value['status'] === 'error') {
                /** @var BatchErrorType $errorValue */
                $errorValue = $value;
                $errors[$key] = BatchItemError::fromArray($errorValue);
            } else {
                /** @var LatestPriceType $itemValue */
                $itemValue = $value;
                $items[$key] = LatestPrice::fromArray($itemValue);
            }
        }

        return new self(items: $items, errors: $errors);
    }
}
