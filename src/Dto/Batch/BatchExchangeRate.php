<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Batch;

use MarekSkopal\TwelveData\Dto\Currencies\ExchangeRate;

/**
 * @phpstan-import-type ExchangeRateType from ExchangeRate
 * @phpstan-type BatchErrorType array{code: int, message: string, status: string}
 */
readonly class BatchExchangeRate
{
    /**
     * @param array<string, ExchangeRate> $items
     * @param array<string, BatchItemError> $errors
     */
    public function __construct(public array $items, public array $errors = [])
    {
    }

    public static function fromJson(string $json): self
    {
        /** @var ExchangeRateType|array<string, ExchangeRateType|BatchErrorType> $responseContents */
        $responseContents = json_decode($json, associative: true);

        // Single-symbol response has 'symbol' at top level
        if (isset($responseContents['symbol']) && is_string($responseContents['symbol'])) {
            /** @var ExchangeRateType $singleResponse */
            $singleResponse = $responseContents;

            return new self(items: [$singleResponse['symbol'] => ExchangeRate::fromArray($singleResponse)]);
        }

        $items = [];
        $errors = [];

        /** @var array<string, ExchangeRateType|BatchErrorType> $batchContents */
        $batchContents = $responseContents;
        foreach ($batchContents as $key => $value) {
            if (isset($value['status']) && $value['status'] === 'error') {
                /** @var BatchErrorType $errorValue */
                $errorValue = $value;
                $errors[$key] = BatchItemError::fromArray($errorValue);
            } else {
                /** @var ExchangeRateType $itemValue */
                $itemValue = $value;
                $items[$key] = ExchangeRate::fromArray($itemValue);
            }
        }

        return new self(items: $items, errors: $errors);
    }
}
