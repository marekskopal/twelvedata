<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Api;

use MarekSkopal\TwelveData\Dto\Batch\BatchItemError;
use MarekSkopal\TwelveData\Exception\BadRequestException;
use const JSON_THROW_ON_ERROR;

readonly class BatchResponse
{
    /**
     * @param array<string, BatchableRequest<object>> $requests
     * @param array<string, string> $rawItems
     */
    public function __construct(private array $requests, private array $rawItems)
    {
    }

    /** @param array<string, BatchableRequest<object>> $requests */
    public static function fromJson(array $requests, string $json): self
    {
        /** @var array<string, array<string, string|int|float|bool|null>> $responseContents */
        $responseContents = json_decode($json, associative: true);

        $rawItems = [];
        foreach ($responseContents as $key => $value) {
            $rawItems[$key] = json_encode($value, JSON_THROW_ON_ERROR);
        }

        return new self(requests: $requests, rawItems: $rawItems);
    }

    public function isError(string $name): bool
    {
        /** @var array{status?: string} $data */
        $data = json_decode($this->rawItems[$name], associative: true);

        return isset($data['status']) && $data['status'] === 'error';
    }

    public function getError(string $name): BatchItemError
    {
        /** @var array{code: int, message: string, status: string} $data */
        $data = json_decode($this->rawItems[$name], associative: true);

        return BatchItemError::fromArray($data);
    }

    public function get(string $name): object
    {
        if ($this->isError($name)) {
            $error = $this->getError($name);

            throw new BadRequestException($error->message);
        }

        return $this->requests[$name]->createResponse($this->rawItems[$name]);
    }
}
