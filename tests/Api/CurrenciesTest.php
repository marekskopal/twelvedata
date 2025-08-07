<?php

declare(strict_types=1);

namespace Api;

use MarekSkopal\TwelveData\Api\Currencies;
use MarekSkopal\TwelveData\Api\TwelveDataApi;
use MarekSkopal\TwelveData\Client\Client;
use MarekSkopal\TwelveData\Config\Config;
use MarekSkopal\TwelveData\Dto\Currencies\CurrencyConversion;
use MarekSkopal\TwelveData\Dto\Currencies\ExchangeRate;
use MarekSkopal\TwelveData\Tests\Fixtures\Client\ClientFixture;
use MarekSkopal\TwelveData\Utils\DateUtils;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Currencies::class)]
#[UsesClass(TwelveDataApi::class)]
#[UsesClass(Client::class)]
#[UsesClass(Config::class)]
#[UsesClass(DateUtils::class)]
#[UsesClass(CurrencyConversion::class)]
#[UsesClass(ExchangeRate::class)]
final class CurrenciesTest extends TestCase
{
    public function testExchangeRate(): void
    {
        $referenceData = new Currencies(ClientFixture::createWithResponse('exchange_rate.json'));

        $this->assertInstanceOf(
            ExchangeRate::class,
            $referenceData->exchangeRate('USD/JPY'),
        );
    }

    public function testCurrencyConversion(): void
    {
        $referenceData = new Currencies(ClientFixture::createWithResponse('currency_conversion.json'));

        $this->assertInstanceOf(
            CurrencyConversion::class,
            $referenceData->currencyConversion('USD/JPY', 122),
        );
    }
}
