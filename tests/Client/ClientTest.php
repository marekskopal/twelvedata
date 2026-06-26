<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Tests\Client;

use GuzzleHttp\Psr7\HttpFactory;
use GuzzleHttp\Psr7\Response;
use MarekSkopal\TwelveData\Client\Client;
use MarekSkopal\TwelveData\Config\Config;
use MarekSkopal\TwelveData\Exception\ApiException;
use MarekSkopal\TwelveData\Exception\InternalServerErrorException;
use MarekSkopal\TwelveData\Exception\NotFoundException;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientInterface as HttpClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

#[CoversClass(Client::class)]
#[UsesClass(Config::class)]
#[UsesClass(ApiException::class)]
#[UsesClass(InternalServerErrorException::class)]
#[UsesClass(NotFoundException::class)]
final class ClientTest extends TestCase
{
    public function testGetReturnsResponseContents(): void
    {
        $client = $this->createClient(new Response(200, [], '{"status":"ok","value":1}'));

        self::assertSame('{"status":"ok","value":1}', $client->get('/quote', []));
    }

    public function testGetThrowsApiExceptionOnErrorStatus(): void
    {
        $client = $this->createClient(
            new Response(404, [], '{"status":"error","code":404,"message":"**symbol** not found"}'),
        );

        $this->expectException(NotFoundException::class);
        $this->expectExceptionMessage('**symbol** not found');
        $this->expectExceptionCode(404);

        $client->get('/quote', []);
    }

    public function testGetThrowsApiExceptionOnNonJsonResponse(): void
    {
        // Cloudflare-style gateway error: a plain-text body that is not valid JSON.
        $client = $this->createClient(new Response(520, [], 'error code: 520'));

        $this->expectException(InternalServerErrorException::class);
        $this->expectExceptionMessage('error code: 520');
        $this->expectExceptionCode(520);

        $client->get('/time_series', ['symbol' => 'ASWC']);
    }

    public function testGetThrowsApiExceptionOnEmptyResponse(): void
    {
        $client = $this->createClient(new Response(500, [], ''));

        $this->expectException(InternalServerErrorException::class);
        $this->expectExceptionMessage('Internal Server Error');
        $this->expectExceptionCode(500);

        $client->get('/time_series', []);
    }

    private function createClient(ResponseInterface $response): Client
    {
        $httpClient = new class ($response) implements HttpClientInterface {
            public function __construct(private readonly ResponseInterface $response)
            {
            }

            public function sendRequest(RequestInterface $request): ResponseInterface
            {
                return $this->response;
            }
        };

        $factory = new HttpFactory();

        return new Client(new Config('demo'), $httpClient, $factory, $factory);
    }
}
