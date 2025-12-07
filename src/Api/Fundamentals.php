<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Api;

use DateTimeImmutable;
use MarekSkopal\TwelveData\Dto\Fundamentals\BalanceSheet;
use MarekSkopal\TwelveData\Dto\Fundamentals\BalanceSheetConsolidated;
use MarekSkopal\TwelveData\Dto\Fundamentals\CashFlow;
use MarekSkopal\TwelveData\Dto\Fundamentals\CashFlowConsolidated;
use MarekSkopal\TwelveData\Dto\Fundamentals\Dividends;
use MarekSkopal\TwelveData\Dto\Fundamentals\DividendsCalendar;
use MarekSkopal\TwelveData\Dto\Fundamentals\Earnings;
use MarekSkopal\TwelveData\Dto\Fundamentals\EarningsCalendar;
use MarekSkopal\TwelveData\Dto\Fundamentals\IncomeStatement;
use MarekSkopal\TwelveData\Dto\Fundamentals\IncomeStatementConsolidated;
use MarekSkopal\TwelveData\Dto\Fundamentals\IpoCalendar;
use MarekSkopal\TwelveData\Dto\Fundamentals\KeyExecutives;
use MarekSkopal\TwelveData\Dto\Fundamentals\LastChanges;
use MarekSkopal\TwelveData\Dto\Fundamentals\Logo;
use MarekSkopal\TwelveData\Dto\Fundamentals\MarketCapitalization;
use MarekSkopal\TwelveData\Dto\Fundamentals\OptionsChain;
use MarekSkopal\TwelveData\Dto\Fundamentals\OptionsExpiration;
use MarekSkopal\TwelveData\Dto\Fundamentals\Profile;
use MarekSkopal\TwelveData\Dto\Fundamentals\Splits;
use MarekSkopal\TwelveData\Dto\Fundamentals\SplitsCalendar;
use MarekSkopal\TwelveData\Dto\Fundamentals\Statistics;
use MarekSkopal\TwelveData\Enum\EarningsPeriodEnum;
use MarekSkopal\TwelveData\Enum\EndpointEnum;
use MarekSkopal\TwelveData\Enum\FormatEnum;
use MarekSkopal\TwelveData\Enum\PeriodEnum;
use MarekSkopal\TwelveData\Enum\RangeEnum;
use MarekSkopal\TwelveData\Enum\TypeEnum;
use MarekSkopal\TwelveData\Exception\InvalidArgumentException;
use MarekSkopal\TwelveData\Utils\DateUtils;
use MarekSkopal\TwelveData\Utils\QueryParamsUtils;

/**
 * @phpstan-import-type DividendsCalendarType from DividendsCalendar
 * @phpstan-import-type SplitsCalendarType from SplitsCalendar
 * @phpstan-import-type IpoCalendarType from IpoCalendar
 */
readonly class Fundamentals extends TwelveDataApi
{
    public function logo(string $symbol, ?string $exchange = null, ?string $micCode = null, ?string $country = null,): Logo
    {
        $response = $this->client->get(
            path: '/logo',
            queryParams: [
                'symbol' => $symbol,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
            ],
        );

        return Logo::fromJson($response);
    }

    public function profile(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
    ): Profile
    {
        if ($symbol === null && $figi === null && $isin === null && $cusip === null) {
            throw InvalidArgumentException::missingParameters(['symbol', 'figi', 'isin', 'cusip']);
        }

        $response = $this->client->get(
            path: '/profile',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
            ],
        );

        return Profile::fromJson($response);
    }

    public function dividends(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?RangeEnum $range = null,
        ?DateTimeImmutable $startDate = null,
        ?DateTimeImmutable $endDate = null,
        ?bool $adjust = null,
    ): Dividends {
        if ($symbol === null && $figi === null && $isin === null && $cusip === null) {
            throw InvalidArgumentException::missingParameters(['symbol', 'figi', 'isin', 'cusip']);
        }

        $response = $this->client->get(
            path: '/dividends',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
                'range' => $range?->value,
                'start_date' => DateUtils::formatDate($startDate),
                'end_date' => DateUtils::formatDate($endDate),
                'adjust' => QueryParamsUtils::booleanAsString($adjust),
            ],
        );

        return Dividends::fromJson($response);
    }

    /** @return list<DividendsCalendar> */
    public function dividendsCalendar(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?DateTimeImmutable $startDate = null,
        ?DateTimeImmutable $endDate = null,
        ?int $outputsize = null,
        ?int $page = null,
    ): array {
        $response = $this->client->get(
            path: '/dividends_calendar',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
                'start_date' => DateUtils::formatDate($startDate),
                'end_date' => DateUtils::formatDate($endDate),
                'outputsize' => $outputsize,
                'page' => $page,
            ],
        );

        /** @var list<DividendsCalendarType> $data */
        $data = json_decode($response, associative: true);

        return array_map(fn (array $item): DividendsCalendar => DividendsCalendar::fromArray($item), $data);
    }

    public function splits(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?RangeEnum $range = null,
        ?DateTimeImmutable $startDate = null,
        ?DateTimeImmutable $endDate = null,
    ): Splits {
        if ($symbol === null && $figi === null && $isin === null && $cusip === null) {
            throw InvalidArgumentException::missingParameters(['symbol', 'figi', 'isin', 'cusip']);
        }

        $response = $this->client->get(
            path: '/splits',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
                'range' => $range?->value,
                'start_date' => DateUtils::formatDate($startDate),
                'end_date' => DateUtils::formatDate($endDate),
            ],
        );

        return Splits::fromJson($response);
    }

    /** @return list<SplitsCalendar> */
    public function splitsCalendar(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?DateTimeImmutable $startDate = null,
        ?DateTimeImmutable $endDate = null,
        ?int $outputsize = null,
        ?int $page = null,
    ): array {
        $response = $this->client->get(
            path: '/splits_calendar',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
                'start_date' => DateUtils::formatDate($startDate),
                'end_date' => DateUtils::formatDate($endDate),
                'outputsize' => $outputsize,
                'page' => $page,
            ],
        );

        /** @var list<SplitsCalendarType> $data */
        $data = json_decode($response, associative: true);

        return array_map(fn (array $item): SplitsCalendar => SplitsCalendar::fromArray($item), $data);
    }

    public function earnings(
        ?string $symbol = null,
        ?string $exchange = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $micCode = null,
        ?string $country = null,
        ?TypeEnum $type = null,
        ?EarningsPeriodEnum $period = null,
        ?string $outputSize = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
        ?int $dp = null,
        ?DateTimeImmutable $startDate = null,
        ?DateTimeImmutable $endDate = null,
    ): Earnings {
        if ($symbol === null && $figi === null && $isin === null && $cusip === null) {
            throw InvalidArgumentException::missingParameters(['symbol', 'figi', 'isin', 'cusip']);
        }

        $response = $this->client->get(
            path: '/earnings',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
                'type' => $type?->value,
                'period' => $period?->value,
                'outputSize' => $outputSize,
                'format' => $format?->value,
                'delimiter' => $delimiter,
                'dp' => $dp,
                'start_date' => DateUtils::formatDate($startDate),
                'end_date' => DateUtils::formatDate($endDate),
            ],
        );

        return Earnings::fromJson($response);
    }

    public function earningsCalendar(
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?TypeEnum $type = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
        ?int $dp = null,
        ?DateTimeImmutable $startDate = null,
        ?DateTimeImmutable $endDate = null,
    ): EarningsCalendar {
        $response = $this->client->get(
            path: '/earnings_calendar',
            queryParams: [
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
                'type' => $type?->value,
                'format' => $format?->value,
                'delimiter' => $delimiter,
                'dp' => $dp,
                'start_date' => DateUtils::formatDate($startDate),
                'end_date' => DateUtils::formatDate($endDate),
            ],
        );

        return EarningsCalendar::fromJson($response);
    }

    /** @return array<string, list<IpoCalendar>> */
    public function ipoCalendar(
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?DateTimeImmutable $startDate = null,
        ?DateTimeImmutable $endDate = null,
    ): array {
        $response = $this->client->get(
            path: '/ipo_calendar',
            queryParams: [
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
                'start_date' => DateUtils::formatDate($startDate),
                'end_date' => DateUtils::formatDate($endDate),
            ],
        );

        /** @var array<string, list<IpoCalendarType>> $data */
        $data = json_decode($response, associative: true);

        $ipoCalendar = [];
        foreach ($data as $date => $items) {
            foreach ($items as $item) {
                $item['date'] = $date;
                $ipoCalendar[$date][] = IpoCalendar::fromArray($item);
            }
        }

        return $ipoCalendar;
    }

    public function statistics(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
    ): Statistics
    {
        if ($symbol === null && $figi === null && $isin === null && $cusip === null) {
            throw InvalidArgumentException::missingParameters(['symbol', 'figi', 'isin', 'cusip']);
        }

        $response = $this->client->get(
            path: '/statistics',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
            ],
        );

        return Statistics::fromJson($response);
    }

    public function incomeStatement(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?PeriodEnum $period = null,
        ?DateTimeImmutable $startDate = null,
        ?DateTimeImmutable $endDate = null,
        ?int $outputsize = null,
    ): IncomeStatement {
        if ($symbol === null && $figi === null && $isin === null && $cusip === null) {
            throw InvalidArgumentException::missingParameters(['symbol', 'figi', 'isin', 'cusip']);
        }

        $response = $this->client->get(
            path: '/income_statement',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
                'period' => $period?->value,
                'start_date' => DateUtils::formatDate($startDate),
                'end_date' => DateUtils::formatDate($endDate),
                'outputsize' => $outputsize,
            ],
        );

        return IncomeStatement::fromJson($response);
    }

    public function incomeStatementConsolidated(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?PeriodEnum $period = null,
        ?DateTimeImmutable $startDate = null,
        ?DateTimeImmutable $endDate = null,
        ?int $outputsize = null,
    ): IncomeStatementConsolidated {
        if ($symbol === null && $figi === null && $isin === null && $cusip === null) {
            throw InvalidArgumentException::missingParameters(['symbol', 'figi', 'isin', 'cusip']);
        }

        $response = $this->client->get(
            path: '/income_statement/consolidated',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
                'period' => $period?->value,
                'start_date' => DateUtils::formatDate($startDate),
                'end_date' => DateUtils::formatDate($endDate),
                'outputsize' => $outputsize,
            ],
        );

        return IncomeStatementConsolidated::fromJson($response);
    }

    public function balanceSheet(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?PeriodEnum $period = null,
        ?DateTimeImmutable $startDate = null,
        ?DateTimeImmutable $endDate = null,
        ?int $outputsize = null,
    ): BalanceSheet {
        if ($symbol === null && $figi === null && $isin === null && $cusip === null) {
            throw InvalidArgumentException::missingParameters(['symbol', 'figi', 'isin', 'cusip']);
        }

        $response = $this->client->get(
            path: '/balance_sheet',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
                'period' => $period?->value,
                'start_date' => DateUtils::formatDate($startDate),
                'end_date' => DateUtils::formatDate($endDate),
                'outputsize' => $outputsize,
            ],
        );

        return BalanceSheet::fromJson($response);
    }

    public function balanceSheetConsolidated(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?PeriodEnum $period = null,
        ?DateTimeImmutable $startDate = null,
        ?DateTimeImmutable $endDate = null,
        ?int $outputsize = null,
    ): BalanceSheetConsolidated {
        if ($symbol === null && $figi === null && $isin === null && $cusip === null) {
            throw InvalidArgumentException::missingParameters(['symbol', 'figi', 'isin', 'cusip']);
        }

        $response = $this->client->get(
            path: '/balance_sheet/consolidated',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
                'period' => $period?->value,
                'start_date' => DateUtils::formatDate($startDate),
                'end_date' => DateUtils::formatDate($endDate),
                'outputsize' => $outputsize,
            ],
        );

        return BalanceSheetConsolidated::fromJson($response);
    }

    public function cashFlow(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?PeriodEnum $period = null,
        ?DateTimeImmutable $startDate = null,
        ?DateTimeImmutable $endDate = null,
        ?int $outputsize = null,
    ): CashFlow {
        if ($symbol === null && $figi === null && $isin === null && $cusip === null) {
            throw InvalidArgumentException::missingParameters(['symbol', 'figi', 'isin', 'cusip']);
        }

        $response = $this->client->get(
            path: '/cash_flow',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
                'period' => $period?->value,
                'start_date' => DateUtils::formatDate($startDate),
                'end_date' => DateUtils::formatDate($endDate),
                'outputsize' => $outputsize,
            ],
        );

        return CashFlow::fromJson($response);
    }

    public function cashFlowConsolidated(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?PeriodEnum $period = null,
        ?DateTimeImmutable $startDate = null,
        ?DateTimeImmutable $endDate = null,
        ?int $outputsize = null,
    ): CashFlowConsolidated {
        if ($symbol === null && $figi === null && $isin === null && $cusip === null) {
            throw InvalidArgumentException::missingParameters(['symbol', 'figi', 'isin', 'cusip']);
        }

        $response = $this->client->get(
            path: '/cash_flow/consolidated',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
                'period' => $period?->value,
                'start_date' => DateUtils::formatDate($startDate),
                'end_date' => DateUtils::formatDate($endDate),
                'outputsize' => $outputsize,
            ],
        );

        return CashFlowConsolidated::fromJson($response);
    }

    public function optionsExpiration(
        string $symbol,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
    ): OptionsExpiration {
        $response = $this->client->get(
            path: '/options/expiration',
            queryParams: [
                'symbol' => $symbol,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
            ],
        );

        return OptionsExpiration::fromJson($response);
    }

    public function optionsChain(
        string $symbol,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?DateTimeImmutable $expirationDate = null,
        ?string $optionId = null,
        ?string $side = null,
    ): OptionsChain {
        $response = $this->client->get(
            path: '/options/chain',
            queryParams: [
                'symbol' => $symbol,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
                'expiration_date' => DateUtils::formatDate($expirationDate),
                'option_id' => $optionId,
                'side' => $side,
            ],
        );

        return OptionsChain::fromJson($response);
    }

    public function keyExecutives(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
    ): KeyExecutives {
        if ($symbol === null && $figi === null && $isin === null && $cusip === null) {
            throw InvalidArgumentException::missingParameters(['symbol', 'figi', 'isin', 'cusip']);
        }

        $response = $this->client->get(
            path: '/key_executives',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
            ],
        );

        return KeyExecutives::fromJson($response);
    }

    public function marketCapitalization(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?DateTimeImmutable $startDate = null,
        ?DateTimeImmutable $endDate = null,
        ?int $page = null,
        ?int $outputsize = null,
    ): MarketCapitalization {
        if ($symbol === null && $figi === null && $isin === null && $cusip === null) {
            throw InvalidArgumentException::missingParameters(['symbol', 'figi', 'isin', 'cusip']);
        }

        $response = $this->client->get(
            path: '/market_cap',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
                'start_date' => DateUtils::formatDate($startDate),
                'end_date' => DateUtils::formatDate($endDate),
                'page' => $page !== null ? (string) $page : null,
                'outputsize' => $outputsize,
            ],
        );

        return MarketCapitalization::fromJson($response);
    }

    public function lastChanges(
        EndpointEnum $endpoint,
        ?DateTimeImmutable $startDate = null,
        ?string $symbol = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?int $page = null,
        ?int $outputsize = null,
    ): LastChanges {
        $response = $this->client->get(
            path: '/last_change/' . $endpoint->value,
            queryParams: [
                'start_date' => DateUtils::formatDateTime($startDate),
                'symbol' => $symbol,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
                'page' => $page !== null ? (string) $page : null,
                'outputsize' => $outputsize,
            ],
        );

        return LastChanges::fromJson($response);
    }
}
