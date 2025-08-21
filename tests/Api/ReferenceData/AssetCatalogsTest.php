<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Tests\Api\ReferenceData;

use MarekSkopal\TwelveData\Api\ReferenceData\AssetCatalogs;
use MarekSkopal\TwelveData\Api\TwelveDataApi;
use MarekSkopal\TwelveData\Client\Client;
use MarekSkopal\TwelveData\Config\Config;
use MarekSkopal\TwelveData\Dto\ReferenceData\Bonds;
use MarekSkopal\TwelveData\Dto\ReferenceData\BondsResult;
use MarekSkopal\TwelveData\Dto\ReferenceData\BondsResultList;
use MarekSkopal\TwelveData\Dto\ReferenceData\Commodities;
use MarekSkopal\TwelveData\Dto\ReferenceData\CommoditiesData;
use MarekSkopal\TwelveData\Dto\ReferenceData\CrossListingsList;
use MarekSkopal\TwelveData\Dto\ReferenceData\CrossListingsResult;
use MarekSkopal\TwelveData\Dto\ReferenceData\CryptocurrencyExchanges;
use MarekSkopal\TwelveData\Dto\ReferenceData\CryptocurrencyExchangesData;
use MarekSkopal\TwelveData\Dto\ReferenceData\CryptocurrencyPairs;
use MarekSkopal\TwelveData\Dto\ReferenceData\CryptocurrencyPairsData;
use MarekSkopal\TwelveData\Dto\ReferenceData\EarliestTimestamp;
use MarekSkopal\TwelveData\Dto\ReferenceData\Etfs;
use MarekSkopal\TwelveData\Dto\ReferenceData\EtfsData;
use MarekSkopal\TwelveData\Dto\ReferenceData\Exchanges;
use MarekSkopal\TwelveData\Dto\ReferenceData\ExchangesData;
use MarekSkopal\TwelveData\Dto\ReferenceData\ForexPairs;
use MarekSkopal\TwelveData\Dto\ReferenceData\ForexPairsData;
use MarekSkopal\TwelveData\Dto\ReferenceData\Funds;
use MarekSkopal\TwelveData\Dto\ReferenceData\FundsResult;
use MarekSkopal\TwelveData\Dto\ReferenceData\FundsResultList;
use MarekSkopal\TwelveData\Dto\ReferenceData\Indices;
use MarekSkopal\TwelveData\Dto\ReferenceData\IndicesData;
use MarekSkopal\TwelveData\Dto\ReferenceData\MarketState;
use MarekSkopal\TwelveData\Dto\ReferenceData\Stocks;
use MarekSkopal\TwelveData\Dto\ReferenceData\StocksData;
use MarekSkopal\TwelveData\Dto\ReferenceData\SymbolSearch;
use MarekSkopal\TwelveData\Dto\ReferenceData\SymbolSearchData;
use MarekSkopal\TwelveData\Tests\Fixtures\Client\ClientFixture;
use MarekSkopal\TwelveData\Utils\DateUtils;
use MarekSkopal\TwelveData\Utils\QueryParamsUtils;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(AssetCatalogs::class)]
#[UsesClass(TwelveDataApi::class)]
#[UsesClass(Client::class)]
#[UsesClass(Config::class)]
#[UsesClass(DateUtils::class)]
#[UsesClass(QueryParamsUtils::class)]
#[UsesClass(Bonds::class)]
#[UsesClass(BondsResultList::class)]
#[UsesClass(BondsResult::class)]
#[UsesClass(CryptocurrencyPairs::class)]
#[UsesClass(CryptocurrencyPairsData::class)]
#[UsesClass(CryptocurrencyExchanges::class)]
#[UsesClass(CryptocurrencyExchangesData::class)]
#[UsesClass(EarliestTimestamp::class)]
#[UsesClass(Etfs::class)]
#[UsesClass(EtfsData::class)]
#[UsesClass(Exchanges::class)]
#[UsesClass(ExchangesData::class)]
#[UsesClass(ForexPairs::class)]
#[UsesClass(ForexPairsData::class)]
#[UsesClass(Funds::class)]
#[UsesClass(FundsResultList::class)]
#[UsesClass(FundsResult::class)]
#[UsesClass(Indices::class)]
#[UsesClass(IndicesData::class)]
#[UsesClass(MarketState::class)]
#[UsesClass(Stocks::class)]
#[UsesClass(StocksData::class)]
#[UsesClass(SymbolSearch::class)]
#[UsesClass(SymbolSearchData::class)]
#[UsesClass(CrossListingsList::class)]
#[UsesClass(CrossListingsResult::class)]
#[UsesClass(Commodities::class)]
#[UsesClass(CommoditiesData::class)]
final class AssetCatalogsTest extends TestCase
{
    public function testStocks(): void
    {
        $referenceData = new AssetCatalogs(ClientFixture::createDemo());

        self::assertInstanceOf(
            Stocks::class,
            $referenceData->stocks('AAPL'),
        );
    }

    public function testForexPairs(): void
    {
        $referenceData = new AssetCatalogs(ClientFixture::createDemo());

        self::assertInstanceOf(
            ForexPairs::class,
            $referenceData->forexPairs('EUR/USD'),
        );
    }

    public function testCryptocurrencyPairs(): void
    {
        $referenceData = new AssetCatalogs(ClientFixture::createDemo());

        self::assertInstanceOf(
            CryptocurrencyPairs::class,
            $referenceData->cryptocurrencyPairs('BTC/USD'),
        );
    }

    public function testEtfs(): void
    {
        $referenceData = new AssetCatalogs(ClientFixture::createDemo());

        self::assertInstanceOf(
            Etfs::class,
            $referenceData->etfs('QQQ'),
        );
    }

    public function testFunds(): void
    {
        $referenceData = new AssetCatalogs(ClientFixture::createDemo());

        self::assertInstanceOf(
            Funds::class,
            $referenceData->funds('0P00000AMH'),
        );
    }

    public function testBonds(): void
    {
        $referenceData = new AssetCatalogs(ClientFixture::createDemo());

        self::assertInstanceOf(
            Bonds::class,
            $referenceData->bonds('AJXA'),
        );
    }

    public function testIndices(): void
    {
        $referenceData = new AssetCatalogs(ClientFixture::createDemo());

        self::assertInstanceOf(
            Indices::class,
            $referenceData->indices('IXIC'),
        );
    }

    public function testCommodities(): void
    {
        $referenceData = new AssetCatalogs(ClientFixture::createDemo());

        self::assertInstanceOf(
            Commodities::class,
            $referenceData->commodities(),
        );
    }
}
