<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Tests\Api;

use MarekSkopal\TwelveData\Api\BatchRequest;
use MarekSkopal\TwelveData\Dto\Batch\BatchItemError;
use MarekSkopal\TwelveData\Dto\Batch\BatchMultiResponse;
use MarekSkopal\TwelveData\Dto\CoreData\LatestPrice;
use MarekSkopal\TwelveData\Dto\CoreData\Quote;
use MarekSkopal\TwelveData\Dto\CoreData\QuoteFiftyTwoWeek;
use MarekSkopal\TwelveData\Dto\CoreData\TimeSeries;
use MarekSkopal\TwelveData\Dto\CoreData\TimeSeriesMeta;
use MarekSkopal\TwelveData\Dto\CoreData\TimeSeriesValue;
use MarekSkopal\TwelveData\Enum\IntervalEnum;
use MarekSkopal\TwelveData\Exception\BadRequestException;
use MarekSkopal\TwelveData\Tests\Fixtures\Client\ClientFixture;
use MarekSkopal\TwelveData\Utils\DateUtils;
use MarekSkopal\TwelveData\Utils\QueryParamsUtils;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(BatchRequest::class)]
#[CoversClass(BatchMultiResponse::class)]
#[UsesClass(BatchItemError::class)]
#[UsesClass(TimeSeries::class)]
#[UsesClass(TimeSeriesMeta::class)]
#[UsesClass(TimeSeriesValue::class)]
#[UsesClass(Quote::class)]
#[UsesClass(QuoteFiftyTwoWeek::class)]
#[UsesClass(LatestPrice::class)]
#[UsesClass(DateUtils::class)]
#[UsesClass(QueryParamsUtils::class)]
#[UsesClass(BadRequestException::class)]
final class BatchRequestTest extends TestCase
{
    public function testExecute(): void
    {
        $client = ClientFixture::createWithResponse('batch_multi.json');

        $response = (new BatchRequest($client))
            ->addTimeSeries('ts_aapl', 'AAPL', IntervalEnum::OneMinute)
            ->addQuote('q_msft', 'MSFT')
            ->addLatestPrice('p_goog', 'GOOG')
            ->execute();

        self::assertInstanceOf(BatchMultiResponse::class, $response);

        $timeSeries = $response->getTimeSeries('ts_aapl');
        self::assertInstanceOf(TimeSeries::class, $timeSeries);
        self::assertSame('AAPL', $timeSeries->meta->symbol);

        $quote = $response->getQuote('q_msft');
        self::assertInstanceOf(Quote::class, $quote);
        self::assertSame('MSFT', $quote->symbol);

        $price = $response->getLatestPrice('p_goog');
        self::assertInstanceOf(LatestPrice::class, $price);
        self::assertSame('176.47000', $price->price);
    }

    public function testIsError(): void
    {
        $client = ClientFixture::createWithResponse('batch_error.json');

        $response = (new BatchRequest($client))
            ->add('AAPL', '/time_series', ['symbol' => 'AAPL'])
            ->add('INVALID', '/time_series', ['symbol' => 'INVALID'])
            ->execute();

        self::assertFalse($response->isError('AAPL'));
        self::assertTrue($response->isError('INVALID'));
    }

    public function testGetErrorThrowsOnAccess(): void
    {
        $client = ClientFixture::createWithResponse('batch_error.json');

        $response = (new BatchRequest($client))
            ->add('INVALID', '/time_series', ['symbol' => 'INVALID'])
            ->execute();

        $this->expectException(BadRequestException::class);
        $response->getTimeSeries('INVALID');
    }
}
