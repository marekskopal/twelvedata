<?php

declare(strict_types=1);

namespace Api\TechnicalIndicators;

use MarekSkopal\TwelveData\Api\TechnicalIndictors\OverlapStudies;
use MarekSkopal\TwelveData\Api\TwelveDataApi;
use MarekSkopal\TwelveData\Client\Client;
use MarekSkopal\TwelveData\Config\Config;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\Meta;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\MetaIndicator;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\OverlapStudies\BollingerBands;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\TechnicalIndicator;
use MarekSkopal\TwelveData\Tests\Fixtures\Client\ClientFixture;
use MarekSkopal\TwelveData\Utils\DateUtils;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(OverlapStudies::class)]
#[UsesClass(TwelveDataApi::class)]
#[UsesClass(Client::class)]
#[UsesClass(Config::class)]
#[UsesClass(DateUtils::class)]
#[UsesClass(TechnicalIndicator::class)]
#[UsesClass(Meta::class)]
#[UsesClass(MetaIndicator::class)]
#[UsesClass(BollingerBands::class)]
final class OverlapStudiesTest extends TestCase
{
    public function testBollingerBands(): void
    {
        $overlapStudies = new OverlapStudies(ClientFixture::createWithResponse('bollinger_bands.json'));

        self::assertInstanceOf(
            BollingerBands::class,
            $overlapStudies->bollingerBands('AAPL')->values[0],
        );
    }
}
