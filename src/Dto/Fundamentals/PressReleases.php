<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-import-type PressReleaseType from PressRelease
 * @phpstan-type PressReleasesType array{
 *     press_releases: list<PressReleaseType>,
 *     status: string,
 * }
 */
readonly class PressReleases
{
    /** @param list<PressRelease> $pressReleases */
    public function __construct(public array $pressReleases, public string $status,)
    {
    }

    public static function fromJson(string $json): self
    {
        /** @var PressReleasesType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param PressReleasesType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            pressReleases: array_map(
                fn (array $item): PressRelease => PressRelease::fromArray($item),
                $data['press_releases'],
            ),
            status: $data['status'],
        );
    }
}
