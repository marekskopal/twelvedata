<?php

declare(strict_types=1);

namespace Api\TechnicalIndicators;

use MarekSkopal\TwelveData\Api\TechnicalIndictors\StatisticFunctions;
use MarekSkopal\TwelveData\Api\TwelveDataApi;
use MarekSkopal\TwelveData\Client\Client;
use MarekSkopal\TwelveData\Config\Config;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\Meta;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\MetaIndicator;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\StatisticFunctions\BetaIndicator;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\StatisticFunctions\Correlation;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\TechnicalIndicator;
use MarekSkopal\TwelveData\Tests\Fixtures\Client\ClientFixture;
use MarekSkopal\TwelveData\Utils\DateUtils;
use MarekSkopal\TwelveData\Utils\QueryParamsUtils;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(StatisticFunctions::class)]
#[UsesClass(TwelveDataApi::class)]
#[UsesClass(Client::class)]
#[UsesClass(Config::class)]
#[UsesClass(DateUtils::class)]
#[UsesClass(QueryParamsUtils::class)]
#[UsesClass(TechnicalIndicator::class)]
#[UsesClass(Meta::class)]
#[UsesClass(MetaIndicator::class)]
#[UsesClass(BetaIndicator::class)]
#[UsesClass(Correlation::class)]
final class StatisticFunctionsTest extends TestCase
{
    public function testBetaIndicator(): void
    {
        $statisticFunctions = new StatisticFunctions(ClientFixture::createWithResponse('beta_indicator.json'));

        self::assertInstanceOf(
            BetaIndicator::class,
            $statisticFunctions->betaIndicator('AAPL')->values[0],
        );
    }

    public function testCorrelation(): void
    {
        $statisticFunctions = new StatisticFunctions(ClientFixture::createWithResponse('correlation.json'));

        self::assertInstanceOf(
            Correlation::class,
            $statisticFunctions->correlation('AAPL')->values[0],
        );
    }
}
