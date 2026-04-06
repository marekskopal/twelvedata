<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Batch;

use MarekSkopal\TwelveData\Dto\CoreData\EndOfDayPrice;
use MarekSkopal\TwelveData\Dto\CoreData\LatestPrice;
use MarekSkopal\TwelveData\Dto\CoreData\Quote;
use MarekSkopal\TwelveData\Dto\CoreData\TimeSeries;
use MarekSkopal\TwelveData\Dto\Currencies\CurrencyConversion;
use MarekSkopal\TwelveData\Dto\Currencies\ExchangeRate;
use MarekSkopal\TwelveData\Exception\BadRequestException;
use const JSON_THROW_ON_ERROR;

readonly class BatchMultiResponse
{
    /** @param array<string, string> $rawItems */
    public function __construct(private array $rawItems)
    {
    }

    public static function fromJson(string $json): self
    {
        /** @var array<string, array<string, string|int|float|bool|null>> $responseContents */
        $responseContents = json_decode($json, associative: true);

        $rawItems = [];
        foreach ($responseContents as $key => $value) {
            $rawItems[$key] = json_encode($value, JSON_THROW_ON_ERROR);
        }

        return new self(rawItems: $rawItems);
    }

    public function isError(string $name): bool
    {
        /** @var array{status?: string} $data */
        $data = json_decode($this->rawItems[$name], associative: true);

        return isset($data['status']) && $data['status'] === 'error';
    }

    public function getError(string $name): BatchItemError
    {
        /** @var array{code: int, message: string, status: string} $data */
        $data = json_decode($this->rawItems[$name], associative: true);

        return BatchItemError::fromArray($data);
    }

    public function getTimeSeries(string $name): TimeSeries
    {
        $this->guardError($name);

        return TimeSeries::fromJson($this->rawItems[$name]);
    }

    public function getQuote(string $name): Quote
    {
        $this->guardError($name);

        return Quote::fromJson($this->rawItems[$name]);
    }

    public function getLatestPrice(string $name): LatestPrice
    {
        $this->guardError($name);

        return LatestPrice::fromJson($this->rawItems[$name]);
    }

    public function getEndOfDayPrice(string $name): EndOfDayPrice
    {
        $this->guardError($name);

        return EndOfDayPrice::fromJson($this->rawItems[$name]);
    }

    public function getExchangeRate(string $name): ExchangeRate
    {
        $this->guardError($name);

        return ExchangeRate::fromJson($this->rawItems[$name]);
    }

    public function getCurrencyConversion(string $name): CurrencyConversion
    {
        $this->guardError($name);

        return CurrencyConversion::fromJson($this->rawItems[$name]);
    }

    private function guardError(string $name): void
    {
        if ($this->isError($name)) {
            $error = $this->getError($name);

            throw new BadRequestException($error->message);
        }
    }
}
