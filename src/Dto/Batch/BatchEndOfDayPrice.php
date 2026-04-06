<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Batch;

use MarekSkopal\TwelveData\Dto\CoreData\EndOfDayPrice;

/**
 * @phpstan-type EndOfDayPriceItemType array{
 *     symbol: string,
 *     exchange: string,
 *     mic_code: string,
 *     currency: string,
 *     datetime: string,
 *     close: string,
 * }
 * @phpstan-type BatchErrorType array{code: int, message: string, status: string}
 */
readonly class BatchEndOfDayPrice
{
    /**
     * @param array<string, EndOfDayPrice> $items
     * @param array<string, BatchItemError> $errors
     */
    public function __construct(public array $items, public array $errors = [])
    {
    }

    public static function fromJson(string $json): self
    {
        /** @var EndOfDayPriceItemType|array<string, EndOfDayPriceItemType|BatchErrorType> $responseContents */
        $responseContents = json_decode($json, associative: true);

        // Single-symbol response has 'symbol' at top level
        if (isset($responseContents['symbol']) && is_string($responseContents['symbol'])) {
            /** @var EndOfDayPriceItemType $singleResponse */
            $singleResponse = $responseContents;

            return new self(items: [$singleResponse['symbol'] => EndOfDayPrice::fromArray($singleResponse)]);
        }

        $items = [];
        $errors = [];

        /** @var array<string, EndOfDayPriceItemType|BatchErrorType> $batchContents */
        $batchContents = $responseContents;
        foreach ($batchContents as $key => $value) {
            if (isset($value['status']) && $value['status'] === 'error') {
                /** @var BatchErrorType $errorValue */
                $errorValue = $value;
                $errors[$key] = BatchItemError::fromArray($errorValue);
            } else {
                /** @var EndOfDayPriceItemType $itemValue */
                $itemValue = $value;
                $items[$key] = EndOfDayPrice::fromArray($itemValue);
            }
        }

        return new self(items: $items, errors: $errors);
    }
}
