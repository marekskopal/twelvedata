<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Client;

use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class Client
{
    private const string BaseUri = 'https://api.twelvedata.com';

    private readonly ClientInterface $httpClient;

    private readonly RequestFactoryInterface $requestFactory;

    public function __construct(private readonly string $apiKey)
    {
        $this->httpClient = Psr18ClientDiscovery::find();
        $this->requestFactory = Psr17FactoryDiscovery::findRequestFactory();
    }

    /** @param array<string, string|null> $queryParams */
    public function get(string $path, array $queryParams): ResponseInterface
    {
        $uri = self::BaseUri . $path;

        if (count($queryParams) > 0) {
            $uri .= '?' . http_build_query($queryParams);
        }

        $request = $this->requestFactory->createRequest('GET', $uri);

        $request = $this->addHeaders($request);

        return $this->httpClient->sendRequest($request);
    }

    private function addHeaders(RequestInterface $request): RequestInterface
    {
        return $request
            ->withHeader('User-Agent', 'marekskopal/twelve-data-client:1.0.0')
            ->withHeader('Authorization', 'apikey ' . $this->apiKey)
            ->withHeader('Content-Type', 'application/json');
    }
}
