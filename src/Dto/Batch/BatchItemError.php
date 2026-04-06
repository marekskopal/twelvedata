<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Batch;

readonly class BatchItemError
{
    public function __construct(public int $code, public string $message, public string $status)
    {
    }

    /**
     * @param array{
     *     code: int,
     *     message: string,
     *     status: string,
     * } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(code: $data['code'], message: $data['message'], status: $data['status']);
    }
}
