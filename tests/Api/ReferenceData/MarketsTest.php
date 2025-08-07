<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Tests\Api\ReferenceData;

use MarekSkopal\TwelveData\Api\ReferenceData\Markets;
use MarekSkopal\TwelveData\Api\TwelveDataApi;
use MarekSkopal\TwelveData\Client\Client;
use MarekSkopal\TwelveData\Config\Config;
use MarekSkopal\TwelveData\Dto\ReferenceData\CryptocurrencyExchanges;
use MarekSkopal\TwelveData\Dto\ReferenceData\CryptocurrencyExchangesData;
use MarekSkopal\TwelveData\Dto\ReferenceData\Exchanges;
use MarekSkopal\TwelveData\Dto\ReferenceData\ExchangeSchedule;
use MarekSkopal\TwelveData\Dto\ReferenceData\ExchangeScheduleData;
use MarekSkopal\TwelveData\Dto\ReferenceData\ExchangeScheduleSession;
use MarekSkopal\TwelveData\Dto\ReferenceData\ExchangesData;
use MarekSkopal\TwelveData\Dto\ReferenceData\MarketState;
use MarekSkopal\TwelveData\Tests\Fixtures\Client\ClientFixture;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Markets::class)]
#[UsesClass(TwelveDataApi::class)]
#[UsesClass(Client::class)]
#[UsesClass(Config::class)]
#[UsesClass(Exchanges::class)]
#[UsesClass(ExchangesData::class)]
#[UsesClass(ExchangeSchedule::class)]
#[UsesClass(ExchangeScheduleData::class)]
#[UsesClass(ExchangeScheduleSession::class)]
#[UsesClass(MarketState::class)]
#[UsesClass(CryptocurrencyExchanges::class)]
#[UsesClass(CryptocurrencyExchangesData::class)]
final class MarketsTest extends TestCase
{
    public function testExchanges(): void
    {
        $referenceData = new Markets(ClientFixture::createDemo());

        $this->assertInstanceOf(
            Exchanges::class,
            $referenceData->exchanges('etf'),
        );
    }

    public function testExchangeSchedule(): void
    {
        $referenceData = new Markets(ClientFixture::createWithResponse('exchange_schedule.json'));

        $this->assertInstanceOf(
            ExchangeSchedule::class,
            $referenceData->exchangeSchedule(),
        );
    }

    public function testCryptocurrencyExchanges(): void
    {
        $referenceData = new Markets(ClientFixture::createDemo());

        $this->assertInstanceOf(
            CryptocurrencyExchanges::class,
            $referenceData->cryptocurrencyExchanges(),
        );
    }

    public function testMarketState(): void
    {
        $referenceData = new Markets(ClientFixture::createDemo());

        $marketState = $referenceData->marketState('NYSE');

        $this->assertIsArray($marketState);
        $this->assertInstanceOf(MarketState::class, $marketState[0]);
    }
}
