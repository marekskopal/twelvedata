<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Tests\Api;

use MarekSkopal\TwelveData\Api\ReferenceData;
use MarekSkopal\TwelveData\Dto\TimeSeries;
use MarekSkopal\TwelveData\Enum\TimeSeriesIntervalEnum;
use MarekSkopal\TwelveData\Tests\Fixtures\Client\ClientFixture;
use PHPUnit\Framework\TestCase;

class ReferenceDataTest extends TestCase
{
    public function testTimeSeries(): void
    {
        $referenceData = new ReferenceData(ClientFixture::createDemo());

        $this->assertInstanceOf(
            TimeSeries::class,
            $referenceData->timeSeries('AAPL', TimeSeriesIntervalEnum::OneMinute),
        );
    }
}
