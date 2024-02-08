<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Tests\Api;

use MarekSkopal\TwelveData\Api\CoreData;
use MarekSkopal\TwelveData\Dto\TimeSeries;
use MarekSkopal\TwelveData\Enum\IntervalEnum;
use MarekSkopal\TwelveData\Tests\Fixtures\Client\ClientFixture;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(CoreData::class)]
class CoreDataTest extends TestCase
{
    public function testTimeSeries(): void
    {
        $referenceData = new CoreData(ClientFixture::createDemo());

        $this->assertInstanceOf(
            TimeSeries::class,
            $referenceData->timeSeries('AAPL', IntervalEnum::OneMinute),
        );
    }
}
