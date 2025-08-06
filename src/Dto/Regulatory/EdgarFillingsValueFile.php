<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Regulatory;

/**
 * @phpstan-type EdgarFillingsValueFileType array{
 *     name: string,
 *     size?: int,
 *     type: string,
 *     url: string
 * }
 */
readonly class EdgarFillingsValueFile
{
    public function __construct(public string $name, public ?int $size, public string $type, public string $url)
    {
    }

    /** @param EdgarFillingsValueFileType $data */
    public static function fromArray(array $data): self
    {
        return new self(name: $data['name'], size: $data['size'] ?? null, type: $data['type'], url: $data['url']);
    }
}
