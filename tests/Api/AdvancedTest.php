<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Tests\Api;

use MarekSkopal\TwelveData\Api\Advanced;
use MarekSkopal\TwelveData\Api\TwelveDataApi;
use MarekSkopal\TwelveData\Client\Client;
use MarekSkopal\TwelveData\Config\Config;
use MarekSkopal\TwelveData\Dto\Advanced\ApiUsage;
use MarekSkopal\TwelveData\Tests\Fixtures\Client\ClientFixture;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Advanced::class)]
#[UsesClass(TwelveDataApi::class)]
#[UsesClass(Client::class)]
#[UsesClass(Config::class)]
#[UsesClass(ApiUsage::class)]
final class AdvancedTest extends TestCase
{
    public function testApiUsage(): void
    {
        $advanced = new Advanced(ClientFixture::createDemo());

        self::assertInstanceOf(
            ApiUsage::class,
            $advanced->apiUsage(),
        );
    }
}
