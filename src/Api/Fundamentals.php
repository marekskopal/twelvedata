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
use MarekSkopal\TwelveData\Dto\Fundamentals\PressReleases;
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
use MarekSkopal\TwelveData\Utils\DateUtils;
use MarekSkopal\TwelveData\Utils\Guard;
use MarekSkopal\TwelveData\Utils\QueryParamsUtils;

/**
 * @phpstan-import-type DividendsCalendarType from DividendsCalendar
 * @phpstan-import-type SplitsCalendarType from SplitsCalendar
 * @phpstan-import-type IpoCalendarType from IpoCalendar
 */
readonly class Fundamentals extends TwelveDataApi
{
    /** @return BatchableRequest<Logo> */
    public function logoRequest(
        string $symbol,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
    ): BatchableRequest {
        return new BatchableRequest(
            path: '/logo',
            queryParams: [
                'symbol' => $symbol,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'country' => $country,
            ],
            responseFactory: Logo::fromJson(...),
        );
    }

    public function logo(string $symbol, ?string $exchange = null, ?string $micCode = null, ?string $country = null,): Logo
    {
        return $this->logoRequest($symbol, $exchange, $micCode, $country)->execute($this->client);
    }

    /** @return BatchableRequest<Profile> */
    public function profileRequest(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
    ): BatchableRequest {
        Guard::requireSymbolIdentifier($symbol, $figi, $isin, $cusip);

        return new BatchableRequest(
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
            responseFactory: Profile::fromJson(...),
        );
    }

    public function profile(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
    ): Profile {
        return $this->profileRequest($symbol, $figi, $isin, $cusip, $exchange, $micCode, $country)->execute($this->client);
    }

    /** @return BatchableRequest<Dividends> */
    public function dividendsRequest(
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
    ): BatchableRequest {
        Guard::requireSymbolIdentifier($symbol, $figi, $isin, $cusip);

        return new BatchableRequest(
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
            responseFactory: Dividends::fromJson(...),
        );
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
        return $this->dividendsRequest(
            $symbol,
            $figi,
            $isin,
            $cusip,
            $exchange,
            $micCode,
            $country,
            $range,
            $startDate,
            $endDate,
            $adjust,
        )->execute($this->client);
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

    /** @return BatchableRequest<Splits> */
    public function splitsRequest(
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
    ): BatchableRequest {
        Guard::requireSymbolIdentifier($symbol, $figi, $isin, $cusip);

        return new BatchableRequest(
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
            responseFactory: Splits::fromJson(...),
        );
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
        return $this->splitsRequest(
            $symbol,
            $figi,
            $isin,
            $cusip,
            $exchange,
            $micCode,
            $country,
            $range,
            $startDate,
            $endDate,
        )->execute($this->client);
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

    /** @return BatchableRequest<Earnings> */
    public function earningsRequest(
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
    ): BatchableRequest {
        Guard::requireSymbolIdentifier($symbol, $figi, $isin, $cusip);

        return new BatchableRequest(
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
            responseFactory: Earnings::fromJson(...),
        );
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
        return $this->earningsRequest(
            $symbol,
            $exchange,
            $figi,
            $isin,
            $cusip,
            $micCode,
            $country,
            $type,
            $period,
            $outputSize,
            $format,
            $delimiter,
            $dp,
            $startDate,
            $endDate,
        )->execute($this->client);
    }

    /** @return BatchableRequest<EarningsCalendar> */
    public function earningsCalendarRequest(
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?TypeEnum $type = null,
        ?FormatEnum $format = null,
        ?string $delimiter = null,
        ?int $dp = null,
        ?DateTimeImmutable $startDate = null,
        ?DateTimeImmutable $endDate = null,
    ): BatchableRequest {
        return new BatchableRequest(
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
            responseFactory: EarningsCalendar::fromJson(...),
        );
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
        return $this->earningsCalendarRequest(
            $exchange,
            $micCode,
            $country,
            $type,
            $format,
            $delimiter,
            $dp,
            $startDate,
            $endDate,
        )->execute($this->client);
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

    /** @return BatchableRequest<Statistics> */
    public function statisticsRequest(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
    ): BatchableRequest {
        Guard::requireSymbolIdentifier($symbol, $figi, $isin, $cusip);

        return new BatchableRequest(
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
            responseFactory: Statistics::fromJson(...),
        );
    }

    public function statistics(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
    ): Statistics {
        return $this->statisticsRequest($symbol, $figi, $isin, $cusip, $exchange, $micCode, $country)->execute($this->client);
    }

    /** @return BatchableRequest<IncomeStatement> */
    public function incomeStatementRequest(
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
    ): BatchableRequest {
        Guard::requireSymbolIdentifier($symbol, $figi, $isin, $cusip);

        return new BatchableRequest(
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
            responseFactory: IncomeStatement::fromJson(...),
        );
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
        return $this->incomeStatementRequest(
            $symbol,
            $figi,
            $isin,
            $cusip,
            $exchange,
            $micCode,
            $country,
            $period,
            $startDate,
            $endDate,
            $outputsize,
        )->execute($this->client);
    }

    /** @return BatchableRequest<IncomeStatementConsolidated> */
    public function incomeStatementConsolidatedRequest(
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
    ): BatchableRequest {
        Guard::requireSymbolIdentifier($symbol, $figi, $isin, $cusip);

        return new BatchableRequest(
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
            responseFactory: IncomeStatementConsolidated::fromJson(...),
        );
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
        return $this->incomeStatementConsolidatedRequest(
            $symbol,
            $figi,
            $isin,
            $cusip,
            $exchange,
            $micCode,
            $country,
            $period,
            $startDate,
            $endDate,
            $outputsize,
        )->execute($this->client);
    }

    /** @return BatchableRequest<BalanceSheet> */
    public function balanceSheetRequest(
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
    ): BatchableRequest {
        Guard::requireSymbolIdentifier($symbol, $figi, $isin, $cusip);

        return new BatchableRequest(
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
            responseFactory: BalanceSheet::fromJson(...),
        );
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
        return $this->balanceSheetRequest(
            $symbol,
            $figi,
            $isin,
            $cusip,
            $exchange,
            $micCode,
            $country,
            $period,
            $startDate,
            $endDate,
            $outputsize,
        )->execute($this->client);
    }

    /** @return BatchableRequest<BalanceSheetConsolidated> */
    public function balanceSheetConsolidatedRequest(
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
    ): BatchableRequest {
        Guard::requireSymbolIdentifier($symbol, $figi, $isin, $cusip);

        return new BatchableRequest(
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
            responseFactory: BalanceSheetConsolidated::fromJson(...),
        );
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
        return $this->balanceSheetConsolidatedRequest(
            $symbol,
            $figi,
            $isin,
            $cusip,
            $exchange,
            $micCode,
            $country,
            $period,
            $startDate,
            $endDate,
            $outputsize,
        )->execute($this->client);
    }

    /** @return BatchableRequest<CashFlow> */
    public function cashFlowRequest(
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
    ): BatchableRequest {
        Guard::requireSymbolIdentifier($symbol, $figi, $isin, $cusip);

        return new BatchableRequest(
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
            responseFactory: CashFlow::fromJson(...),
        );
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
        return $this->cashFlowRequest(
            $symbol,
            $figi,
            $isin,
            $cusip,
            $exchange,
            $micCode,
            $country,
            $period,
            $startDate,
            $endDate,
            $outputsize,
        )->execute($this->client);
    }

    /** @return BatchableRequest<CashFlowConsolidated> */
    public function cashFlowConsolidatedRequest(
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
    ): BatchableRequest {
        Guard::requireSymbolIdentifier($symbol, $figi, $isin, $cusip);

        return new BatchableRequest(
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
            responseFactory: CashFlowConsolidated::fromJson(...),
        );
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
        return $this->cashFlowConsolidatedRequest(
            $symbol,
            $figi,
            $isin,
            $cusip,
            $exchange,
            $micCode,
            $country,
            $period,
            $startDate,
            $endDate,
            $outputsize,
        )->execute($this->client);
    }

    /** @return BatchableRequest<KeyExecutives> */
    public function keyExecutivesRequest(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
    ): BatchableRequest {
        Guard::requireSymbolIdentifier($symbol, $figi, $isin, $cusip);

        return new BatchableRequest(
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
            responseFactory: KeyExecutives::fromJson(...),
        );
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
        return $this->keyExecutivesRequest($symbol, $figi, $isin, $cusip, $exchange, $micCode, $country)->execute($this->client);
    }

    /** @return BatchableRequest<MarketCapitalization> */
    public function marketCapitalizationRequest(
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
    ): BatchableRequest {
        Guard::requireSymbolIdentifier($symbol, $figi, $isin, $cusip);

        return new BatchableRequest(
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
            responseFactory: MarketCapitalization::fromJson(...),
        );
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
        return $this->marketCapitalizationRequest(
            $symbol,
            $figi,
            $isin,
            $cusip,
            $exchange,
            $micCode,
            $country,
            $startDate,
            $endDate,
            $page,
            $outputsize,
        )->execute($this->client);
    }

    /** @return BatchableRequest<PressReleases> */
    public function pressReleasesRequest(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?DateTimeImmutable $startDate = null,
        ?DateTimeImmutable $endDate = null,
        ?string $language = null,
        ?string $timezone = null,
        ?int $outputsize = null,
    ): BatchableRequest {
        Guard::requireSymbolIdentifier($symbol, $figi, $isin, $cusip);

        return new BatchableRequest(
            path: '/press_releases',
            queryParams: [
                'symbol' => $symbol,
                'figi' => $figi,
                'isin' => $isin,
                'cusip' => $cusip,
                'exchange' => $exchange,
                'mic_code' => $micCode,
                'start_date' => DateUtils::formatDate($startDate),
                'end_date' => DateUtils::formatDate($endDate),
                'language' => $language,
                'timezone' => $timezone,
                'outputsize' => $outputsize,
            ],
            responseFactory: PressReleases::fromJson(...),
        );
    }

    public function pressReleases(
        ?string $symbol = null,
        ?string $figi = null,
        ?string $isin = null,
        ?string $cusip = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?DateTimeImmutable $startDate = null,
        ?DateTimeImmutable $endDate = null,
        ?string $language = null,
        ?string $timezone = null,
        ?int $outputsize = null,
    ): PressReleases {
        return $this->pressReleasesRequest(
            $symbol,
            $figi,
            $isin,
            $cusip,
            $exchange,
            $micCode,
            $startDate,
            $endDate,
            $language,
            $timezone,
            $outputsize,
        )->execute($this->client);
    }

    /** @return BatchableRequest<LastChanges> */
    public function lastChangesRequest(
        EndpointEnum $endpoint,
        ?DateTimeImmutable $startDate = null,
        ?string $symbol = null,
        ?string $exchange = null,
        ?string $micCode = null,
        ?string $country = null,
        ?int $page = null,
        ?int $outputsize = null,
    ): BatchableRequest {
        return new BatchableRequest(
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
            responseFactory: LastChanges::fromJson(...),
        );
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
        return $this->lastChangesRequest(
            $endpoint,
            $startDate,
            $symbol,
            $exchange,
            $micCode,
            $country,
            $page,
            $outputsize,
        )->execute($this->client);
    }
}
