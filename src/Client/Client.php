<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Client;

use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use MarekSkopal\TwelveData\Config\Config;
use MarekSkopal\TwelveData\Exception\ApiException;
use MarekSkopal\TwelveData\Exception\TooManyRequestsException;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

readonly class Client implements ClientInterface
{
    private const string BaseUri = 'https://api.twelvedata.com';

    private \Psr\Http\Client\ClientInterface $httpClient;

    private RequestFactoryInterface $requestFactory;

    public function __construct(private Config $config)
    {
        $this->httpClient = Psr18ClientDiscovery::find();
        $this->requestFactory = Psr17FactoryDiscovery::findRequestFactory();
    }

    /** @param array<string, scalar|null> $queryParams */
    public function get(string $path, array $queryParams, int $retryCount = 0): string
    {
        $uri = self::BaseUri . $path;

        if (count($queryParams) > 0) {
            $uri .= '?' . http_build_query($queryParams);
        }

        $request = $this->requestFactory->createRequest('GET', $uri);

        $request = $this->addHeaders($request);

        $response = $this->httpClient->sendRequest($request);

        try {
            return $this->getContents($response);
        } catch (TooManyRequestsException $e) {
            if (
                $this->config->tooManyRequestsRepeat <= 0
                || $this->config->tooManyRequestsWaitTime <= 0
                || $retryCount >= $this->config->tooManyRequestsRepeat
            ) {
                throw $e;
            }

            sleep($this->config->tooManyRequestsWaitTime);

            return $this->get($path, $queryParams, $retryCount + 1);
        }
    }

    private function getContents(ResponseInterface $response): string
    {
        $responseContents = $response->getBody()->getContents();

        /** @var array{status?: string, code?: int, message?: string} $data */
        $data = json_decode($responseContents, associative: true);

        $status = $data['status'] ?? null;

        if ($status === 'error') {
            throw ApiException::fromCode($data['message'] ?? 'Internal Server Error', $data['code'] ?? 500);
        }

        return $responseContents;
    }

    private function addHeaders(RequestInterface $request): RequestInterface
    {
        return $request
            ->withHeader('User-Agent', 'marekskopal/twelvedata-client:1.0.0')
            ->withHeader('Authorization', 'apikey ' . $this->config->apiKey)
            ->withHeader('Content-Type', 'application/json');
    }
}
