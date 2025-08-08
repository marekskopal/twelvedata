<?php

declare(strict_types=1);

namespace Api;

use MarekSkopal\TwelveData\Api\Analysis;
use MarekSkopal\TwelveData\Api\TwelveDataApi;
use MarekSkopal\TwelveData\Client\Client;
use MarekSkopal\TwelveData\Config\Config;
use MarekSkopal\TwelveData\Dto\Analysis\EarningsEstimate;
use MarekSkopal\TwelveData\Dto\Analysis\EarningsEstimateEarningsEstimate;
use MarekSkopal\TwelveData\Dto\Analysis\Meta;
use MarekSkopal\TwelveData\Dto\Analysis\RevenueEstimate;
use MarekSkopal\TwelveData\Dto\Analysis\RevenueEstimateRevenueEstimate;
use MarekSkopal\TwelveData\Tests\Fixtures\Client\ClientFixture;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Analysis::class)]
#[UsesClass(TwelveDataApi::class)]
#[UsesClass(Client::class)]
#[UsesClass(Config::class)]
#[UsesClass(Meta::class)]
#[UsesClass(EarningsEstimate::class)]
#[UsesClass(EarningsEstimateEarningsEstimate::class)]
#[UsesClass(RevenueEstimate::class)]
#[UsesClass(RevenueEstimateRevenueEstimate::class)]
final class AnalysisTest extends TestCase
{
    public function testEarningsEstimate(): void
    {
        $analysis = new Analysis(ClientFixture::createWithResponse('earnings_estimate.json'));

        $this->assertInstanceOf(
            EarningsEstimate::class,
            $analysis->earningsEstimate('AAPL'),
        );
    }

    public function testRevenueEstimate(): void
    {
        $analysis = new Analysis(ClientFixture::createWithResponse('revenue_estimate.json'));

        $this->assertInstanceOf(
            RevenueEstimate::class,
            $analysis->revenueEstimate('AAPL'),
        );
    }
}
