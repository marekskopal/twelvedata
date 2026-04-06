<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Batch;

use MarekSkopal\TwelveData\Dto\Currencies\CurrencyConversion;

/**
 * @phpstan-import-type CurrencyConversionType from CurrencyConversion
 * @phpstan-type BatchErrorType array{code: int, message: string, status: string}
 */
readonly class BatchCurrencyConversion
{
    /**
     * @param array<string, CurrencyConversion> $items
     * @param array<string, BatchItemError> $errors
     */
    public function __construct(public array $items, public array $errors = [])
    {
    }

    public static function fromJson(string $json): self
    {
        /** @var CurrencyConversionType|array<string, CurrencyConversionType|BatchErrorType> $responseContents */
        $responseContents = json_decode($json, associative: true);

        // Single-symbol response has 'symbol' at top level
        if (isset($responseContents['symbol']) && is_string($responseContents['symbol'])) {
            /** @var CurrencyConversionType $singleResponse */
            $singleResponse = $responseContents;

            return new self(items: [$singleResponse['symbol'] => CurrencyConversion::fromArray($singleResponse)]);
        }

        $items = [];
        $errors = [];

        /** @var array<string, CurrencyConversionType|BatchErrorType> $batchContents */
        $batchContents = $responseContents;
        foreach ($batchContents as $key => $value) {
            if (isset($value['status']) && $value['status'] === 'error') {
                /** @var BatchErrorType $errorValue */
                $errorValue = $value;
                $errors[$key] = BatchItemError::fromArray($errorValue);
            } else {
                /** @var CurrencyConversionType $itemValue */
                $itemValue = $value;
                $items[$key] = CurrencyConversion::fromArray($itemValue);
            }
        }

        return new self(items: $items, errors: $errors);
    }
}
