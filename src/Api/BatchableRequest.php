<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Api;

use Closure;
use MarekSkopal\TwelveData\Client\ClientInterface;

/** @template-covariant T of object */
readonly class BatchableRequest
{
    /**
     * @param array<string, scalar|null> $queryParams
     * @param Closure(string): T $responseFactory
     */
    public function __construct(public string $path, public array $queryParams, private Closure $responseFactory,)
    {
    }

    /** @return T */
    public function execute(ClientInterface $client): object
    {
        $response = $client->get($this->path, $this->queryParams);

        return ($this->responseFactory)($response);
    }

    public function getUrl(): string
    {
        $url = '/' . ltrim($this->path, '/');

        /** @var array<string, scalar> $filteredParams */
        $filteredParams = array_filter($this->queryParams, static fn (string|int|float|bool|null $value): bool => $value !== null);
        if (count($filteredParams) > 0) {
            $url .= '?' . http_build_query($filteredParams);
        }

        return $url;
    }

    /** @return T */
    public function createResponse(string $json): object
    {
        return ($this->responseFactory)($json);
    }
}
