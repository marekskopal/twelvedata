<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Batch;

use MarekSkopal\TwelveData\Dto\CoreData\TimeSeries;

/**
 * @phpstan-type TimeSeriesItemType array{
 *     meta: array{
 *         symbol: string,
 *         interval: string,
 *         currency?: string,
 *         exchange_timezone?: string,
 *         exchange?: string,
 *         mic_code?: string,
 *         currency_base?: string,
 *         currency_quote?: string,
 *         type: string,
 *     },
 *     values: list<array{
 *         datetime: string,
 *         open: string,
 *         high: string,
 *         low: string,
 *         close: string,
 *         volume?: string,
 *     }>,
 *     status: string,
 * }
 * @phpstan-type BatchErrorType array{code: int, message: string, status: string}
 */
readonly class BatchTimeSeries
{
    /**
     * @param array<string, TimeSeries> $items
     * @param array<string, BatchItemError> $errors
     */
    public function __construct(public array $items, public array $errors = [])
    {
    }

    public static function fromJson(string $json): self
    {
        /** @var TimeSeriesItemType|array<string, TimeSeriesItemType|BatchErrorType> $responseContents */
        $responseContents = json_decode($json, associative: true);

        // Single-symbol response has 'status' at top level
        if (isset($responseContents['status']) && is_string($responseContents['status'])) {
            /** @var TimeSeriesItemType $singleResponse */
            $singleResponse = $responseContents;
            $symbol = $singleResponse['meta']['symbol'];

            return new self(items: [$symbol => TimeSeries::fromArray($singleResponse)]);
        }

        $items = [];
        $errors = [];

        /** @var array<string, TimeSeriesItemType|BatchErrorType> $batchContents */
        $batchContents = $responseContents;
        foreach ($batchContents as $key => $value) {
            if ($value['status'] === 'error') {
                /** @var BatchErrorType $errorValue */
                $errorValue = $value;
                $errors[$key] = BatchItemError::fromArray($errorValue);
            } else {
                /** @var TimeSeriesItemType $itemValue */
                $itemValue = $value;
                $items[$key] = TimeSeries::fromArray($itemValue);
            }
        }

        return new self(items: $items, errors: $errors);
    }
}
