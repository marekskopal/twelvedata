<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Api;

use MarekSkopal\TwelveData\Exception\ApiException;
use Psr\Http\Message\ResponseInterface;

abstract class TwelveDataApi
{
    protected function getResponseContents(ResponseInterface $response): string
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
}
