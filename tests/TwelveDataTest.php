<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Tests;

use MarekSkopal\TwelveData\Api\ReferenceData;
use MarekSkopal\TwelveData\Api\TechnicalIndicators;
use MarekSkopal\TwelveData\Api\TwelveDataApi;
use MarekSkopal\TwelveData\Client\Client;
use MarekSkopal\TwelveData\Config\Config;
use MarekSkopal\TwelveData\TwelveData;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;
use stdClass;

#[CoversClass(TwelveData::class)]
#[UsesClass(Config::class)]
#[UsesClass(Client::class)]
#[UsesClass(TwelveDataApi::class)]
#[UsesClass(ReferenceData::class)]
#[UsesClass(TechnicalIndicators::class)]
final class TwelveDataTest extends TestCase
{
    public function testGet(): void
    {
        $twelveData = new TwelveData(new Config('demo'));
        $response = $twelveData->get('api_usage');

        self::assertInstanceOf(stdClass::class, $response);
        self::assertSame(0, $response->current_usage);
    }
}
