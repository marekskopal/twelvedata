<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Batch;

use MarekSkopal\TwelveData\Dto\CoreData\Quote;

/**
 * @phpstan-type QuoteItemType array{
 *     symbol: string,
 *     name: string,
 *     exchange: string,
 *     mic_code: string,
 *     currency: string,
 *     datetime: string,
 *     timestamp: int,
 *     open: string,
 *     high: string,
 *     low: string,
 *     close: string,
 *     volume: string,
 *     previous_close: string,
 *     change: string,
 *     percent_change: string,
 *     average_volume: string,
 *     rolling_1d_change?: string,
 *     rolling_7d_change?: string,
 *     rolling_period_change?: string,
 *     is_market_open: bool,
 *     fifty_two_week: array{
 *         low: string,
 *         high: string,
 *         low_change: string,
 *         high_change: string,
 *         low_change_percent: string,
 *         high_change_percent: string,
 *         range: string,
 *     },
 *     extended_change?: string,
 *     extended_percent_change?: string,
 *     extended_price?: string,
 *     extended_timestamp?: int,
 * }
 * @phpstan-type BatchErrorType array{code: int, message: string, status: string}
 */
readonly class BatchQuote
{
    /**
     * @param array<string, Quote> $items
     * @param array<string, BatchItemError> $errors
     */
    public function __construct(public array $items, public array $errors = [])
    {
    }

    public static function fromJson(string $json): self
    {
        /** @var QuoteItemType|array<string, QuoteItemType|BatchErrorType> $responseContents */
        $responseContents = json_decode($json, associative: true);

        // Single-symbol response has 'symbol' at top level
        if (isset($responseContents['symbol']) && is_string($responseContents['symbol'])) {
            /** @var QuoteItemType $singleResponse */
            $singleResponse = $responseContents;

            return new self(items: [$singleResponse['symbol'] => Quote::fromArray($singleResponse)]);
        }

        $items = [];
        $errors = [];

        /** @var array<string, QuoteItemType|BatchErrorType> $batchContents */
        $batchContents = $responseContents;
        foreach ($batchContents as $key => $value) {
            if (isset($value['status']) && $value['status'] === 'error') {
                /** @var BatchErrorType $errorValue */
                $errorValue = $value;
                $errors[$key] = BatchItemError::fromArray($errorValue);
            } else {
                /** @var QuoteItemType $itemValue */
                $itemValue = $value;
                $items[$key] = Quote::fromArray($itemValue);
            }
        }

        return new self(items: $items, errors: $errors);
    }
}
