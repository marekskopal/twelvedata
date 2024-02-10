<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Tests\Api;

use MarekSkopal\TwelveData\Api\Advanced;
use MarekSkopal\TwelveData\Dto\Advanced\ApiUsage;
use MarekSkopal\TwelveData\Tests\Fixtures\Client\ClientFixture;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Advanced::class)]
class AdvancedTest extends TestCase
{
    public function testApiUsage(): void
    {
        $advanced = new Advanced(ClientFixture::createDemo());

        $this->assertInstanceOf(
            ApiUsage::class,
            $advanced->apiUsage(),
        );
    }
}
