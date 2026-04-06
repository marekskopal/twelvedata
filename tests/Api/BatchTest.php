<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Tests\Api;

use MarekSkopal\TwelveData\Api\BatchableRequest;
use MarekSkopal\TwelveData\Api\BatchResponse;
use MarekSkopal\TwelveData\Api\CoreData;
use MarekSkopal\TwelveData\Api\Currencies;
use MarekSkopal\TwelveData\Api\TwelveDataApi;
use MarekSkopal\TwelveData\Dto\Batch\BatchItemError;
use MarekSkopal\TwelveData\Dto\CoreData\LatestPrice;
use MarekSkopal\TwelveData\Dto\CoreData\Quote;
use MarekSkopal\TwelveData\Dto\CoreData\QuoteFiftyTwoWeek;
use MarekSkopal\TwelveData\Dto\CoreData\TimeSeries;
use MarekSkopal\TwelveData\Dto\CoreData\TimeSeriesMeta;
use MarekSkopal\TwelveData\Dto\CoreData\TimeSeriesValue;
use MarekSkopal\TwelveData\Dto\Currencies\ExchangeRate;
use MarekSkopal\TwelveData\Enum\IntervalEnum;
use MarekSkopal\TwelveData\Exception\BadRequestException;
use MarekSkopal\TwelveData\Tests\Fixtures\Client\ClientFixture;
use MarekSkopal\TwelveData\Utils\DateUtils;
use MarekSkopal\TwelveData\Utils\Guard;
use MarekSkopal\TwelveData\Utils\QueryParamsUtils;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(BatchableRequest::class)]
#[CoversClass(BatchResponse::class)]
#[UsesClass(CoreData::class)]
#[UsesClass(Currencies::class)]
#[UsesClass(TwelveDataApi::class)]
#[UsesClass(BatchItemError::class)]
#[UsesClass(TimeSeries::class)]
#[UsesClass(TimeSeriesMeta::class)]
#[UsesClass(TimeSeriesValue::class)]
#[UsesClass(Quote::class)]
#[UsesClass(QuoteFiftyTwoWeek::class)]
#[UsesClass(LatestPrice::class)]
#[UsesClass(ExchangeRate::class)]
#[UsesClass(DateUtils::class)]
#[UsesClass(QueryParamsUtils::class)]
#[UsesClass(Guard::class)]
#[UsesClass(BadRequestException::class)]
final class BatchTest extends TestCase
{
    public function testExecuteBatch(): void
    {
        $client = ClientFixture::createWithResponse('batch_multi.json');

        $coreData = new CoreData($client);
        $requests = [
            'ts_aapl' => $coreData->timeSeriesRequest('AAPL', IntervalEnum::OneMinute),
            'q_msft' => $coreData->quoteRequest('MSFT'),
            'p_goog' => $coreData->latestPriceRequest('GOOG'),
        ];

        $response = BatchResponse::fromJson($requests, $client->post('/', ''));

        self::assertInstanceOf(BatchResponse::class, $response);

        $timeSeries = $response->get('ts_aapl');
        self::assertInstanceOf(TimeSeries::class, $timeSeries);

        $quote = $response->get('q_msft');
        self::assertInstanceOf(Quote::class, $quote);

        $price = $response->get('p_goog');
        self::assertInstanceOf(LatestPrice::class, $price);
    }

    public function testBatchableRequestExecute(): void
    {
        $client = ClientFixture::createWithResponse('batch_multi.json');

        $coreData = new CoreData($client);
        $request = $coreData->timeSeriesRequest('AAPL', IntervalEnum::OneMinute);

        self::assertInstanceOf(BatchableRequest::class, $request);
        self::assertSame('/time_series', $request->path);
    }

    public function testBatchableRequestGetUrl(): void
    {
        $client = ClientFixture::createWithResponse('batch_multi.json');

        $coreData = new CoreData($client);
        $request = $coreData->timeSeriesRequest('AAPL', IntervalEnum::OneMinute);

        $url = $request->getUrl();
        self::assertStringStartsWith('/time_series?', $url);
        self::assertStringContainsString('symbol=AAPL', $url);
    }

    public function testBatchIsError(): void
    {
        $client = ClientFixture::createWithResponse('batch_error.json');

        $coreData = new CoreData($client);
        $requests = [
            'AAPL' => $coreData->timeSeriesRequest('AAPL'),
            'INVALID' => $coreData->timeSeriesRequest('INVALID_SYMBOL'),
        ];

        $response = BatchResponse::fromJson($requests, $client->post('/', ''));

        self::assertFalse($response->isError('AAPL'));
        self::assertTrue($response->isError('INVALID'));
    }

    public function testBatchGetErrorThrows(): void
    {
        $client = ClientFixture::createWithResponse('batch_error.json');

        $coreData = new CoreData($client);
        $requests = [
            'INVALID' => $coreData->timeSeriesRequest('INVALID_SYMBOL'),
        ];

        $response = BatchResponse::fromJson($requests, $client->post('/', ''));

        $this->expectException(BadRequestException::class);
        $response->get('INVALID');
    }

    public function testCurrenciesRequest(): void
    {
        $client = ClientFixture::createWithResponse('batch_multi.json');

        $currencies = new Currencies($client);
        $request = $currencies->exchangeRateRequest('USD/EUR');

        self::assertInstanceOf(BatchableRequest::class, $request);
        self::assertSame('/exchange_rate', $request->path);
    }
}
