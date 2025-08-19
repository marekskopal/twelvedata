<?php

declare(strict_types=1);

namespace Api\TechnicalIndicators;

use MarekSkopal\TwelveData\Api\TechnicalIndictors\PriceTransform;
use MarekSkopal\TwelveData\Api\TwelveDataApi;
use MarekSkopal\TwelveData\Client\Client;
use MarekSkopal\TwelveData\Config\Config;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\Meta;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\MetaIndicator;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\PriceTransform\Addition;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\PriceTransform\Average;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\PriceTransform\AveragePrice;
use MarekSkopal\TwelveData\Dto\TechnicalIndicators\TechnicalIndicator;
use MarekSkopal\TwelveData\Tests\Fixtures\Client\ClientFixture;
use MarekSkopal\TwelveData\Utils\DateUtils;
use MarekSkopal\TwelveData\Utils\QueryParamsUtils;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(PriceTransform::class)]
#[UsesClass(TwelveDataApi::class)]
#[UsesClass(Client::class)]
#[UsesClass(Config::class)]
#[UsesClass(DateUtils::class)]
#[UsesClass(QueryParamsUtils::class)]
#[UsesClass(TechnicalIndicator::class)]
#[UsesClass(Meta::class)]
#[UsesClass(MetaIndicator::class)]
#[UsesClass(Addition::class)]
#[UsesClass(Average::class)]
#[UsesClass(AveragePrice::class)]
final class PriceTransformTest extends TestCase
{
    public function testAddition(): void
    {
        $priceTransform = new PriceTransform(ClientFixture::createWithResponse('addition.json'));

        self::assertInstanceOf(
            Addition::class,
            $priceTransform->addition('AAPL')->values[0],
        );
    }

    public function testAverage(): void
    {
        $priceTransform = new PriceTransform(ClientFixture::createWithResponse('average.json'));

        self::assertInstanceOf(
            Average::class,
            $priceTransform->average('AAPL')->values[0],
        );
    }

    public function testAveragePrice(): void
    {
        $priceTransform = new PriceTransform(ClientFixture::createWithResponse('average_price.json'));

        self::assertInstanceOf(
            AveragePrice::class,
            $priceTransform->averagePrice('AAPL')->values[0],
        );
    }
}
