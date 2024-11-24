<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Tests\Fixtures\Client;

use MarekSkopal\TwelveData\Client\Client;
use MarekSkopal\TwelveData\Client\ClientInterface;
use MarekSkopal\TwelveData\Config\Config;

final class ClientFixture implements ClientInterface
{
    public function __construct(private string $responseFilename)
    {
    }

    public static function createDemo(): ClientInterface
    {
        return new Client(new Config(apiKey: 'demo'));
    }

    public static function createWithResponse(string $responseFilename): ClientInterface
    {
        return new self($responseFilename);
    }

    /** @param array<string, scalar|null> $queryParams */
    public function get(string $path, array $queryParams, int $retryCount = 0): string
    {
        return $this->getResponse();
    }

    private function getResponse(): string
    {
        return (string) file_get_contents(__DIR__ . '/../Response/' . $this->responseFilename);
    }
}
