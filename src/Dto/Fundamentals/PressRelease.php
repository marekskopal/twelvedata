<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

use DateTimeImmutable;

/**
 * @phpstan-type PressReleaseType array{
 *     id: string,
 *     datetime: string,
 *     title: string,
 *     body: string,
 *     style: string,
 *     language: list<string>,
 * }
 */
readonly class PressRelease
{
    /** @param list<string> $language */
    public function __construct(
        public string $id,
        public DateTimeImmutable $datetime,
        public string $title,
        public string $body,
        public string $style,
        public array $language,
    ) {
    }

    /** @param PressReleaseType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            datetime: new DateTimeImmutable($data['datetime']),
            title: $data['title'],
            body: $data['body'],
            style: $data['style'],
            language: $data['language'],
        );
    }
}
