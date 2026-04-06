<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData;

use JsonException;
use MarekSkopal\TwelveData\Api\Advanced;
use MarekSkopal\TwelveData\Api\Analysis;
use MarekSkopal\TwelveData\Api\CoreData;
use MarekSkopal\TwelveData\Api\Currencies;
use MarekSkopal\TwelveData\Api\Etfs;
use MarekSkopal\TwelveData\Api\Fundamentals;
use MarekSkopal\TwelveData\Api\MutualFunds;
use MarekSkopal\TwelveData\Api\RealTimePrice;
use MarekSkopal\TwelveData\Api\ReferenceData;
use MarekSkopal\TwelveData\Api\Regulatory;
use MarekSkopal\TwelveData\Api\TechnicalIndicators;
use MarekSkopal\TwelveData\Client\Client;
use MarekSkopal\TwelveData\Config\Config;
use MarekSkopal\TwelveData\WebSocket\WebSocketClientInterface;
use const JSON_THROW_ON_ERROR;

readonly class TwelveData
{
    private Client $client;

    private Config $config;

    public ReferenceData $referenceData;

    public CoreData $coreData;

    public Fundamentals $fundamentals;

    public Currencies $currencies;

    public TechnicalIndicators $technicalIndicators;

    public Analysis $analysis;

    public Regulatory $regulatory;

    public Advanced $advanced;

    public Etfs $etfs;

    public MutualFunds $mutualFunds;

    public function __construct(Config $config)
    {
        $this->config = $config;
        $this->client = new Client($config);

        $this->coreData = new CoreData($this->client);
        $this->referenceData = new ReferenceData($this->client);
        $this->fundamentals = new Fundamentals($this->client);
        $this->currencies = new Currencies($this->client);
        $this->technicalIndicators = new TechnicalIndicators($this->client);
        $this->analysis = new Analysis($this->client);
        $this->regulatory = new Regulatory($this->client);
        $this->advanced = new Advanced($this->client);
        $this->etfs = new Etfs($this->client);
        $this->mutualFunds = new MutualFunds($this->client);
    }

    public function getCoreData(): CoreData
    {
        return $this->coreData;
    }

    public function getReferenceData(): ReferenceData
    {
        return $this->referenceData;
    }

    public function getFundamentals(): Fundamentals
    {
        return $this->fundamentals;
    }

    public function getCurrencies(): Currencies
    {
        return $this->currencies;
    }

    public function getTechnicalIndicators(): TechnicalIndicators
    {
        return $this->technicalIndicators;
    }

    public function getAnalysis(): Analysis
    {
        return $this->analysis;
    }

    public function getRegulatory(): Regulatory
    {
        return $this->regulatory;
    }

    public function getAdvanced(): Advanced
    {
        return $this->advanced;
    }

    public function getEtfs(): Etfs
    {
        return $this->etfs;
    }

    public function getMutualFunds(): MutualFunds
    {
        return $this->mutualFunds;
    }

    public function createRealTimePrice(WebSocketClientInterface $webSocketClient): RealTimePrice
    {
        return new RealTimePrice($webSocketClient, $this->config);
    }

    /**
     * @param string $path
     * @param array<string, scalar|null> $queryParams
     * @return object|array<int|string, object|array<int|string, object|string|int|float|bool|null>|string|int|float|bool|null>|null
     */
    public function get(string $path, array $queryParams = []): object|array|null
    {
        $path = '/' . ltrim($path, '/');

        try {
            //@phpstan-ignore-next-line return.type
            return json_decode($this->client->get($path, $queryParams), associative: false, flags: JSON_THROW_ON_ERROR);
        } catch (JsonException) {
            // JSON decoding failed, return null
        }

        return null;
    }
}
