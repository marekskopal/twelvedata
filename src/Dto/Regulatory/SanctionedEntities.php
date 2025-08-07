<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Regulatory;

/**
 * @phpstan-import-type SanctionedEntitiesSanctionType from SanctionedEntitiesSanction
 * @phpstan-type SanctionedEntitiesType array{
 *     sanctions: list<SanctionedEntitiesSanctionType>,
 *     count: int,
 *     status: string,
 * }
 */
readonly class SanctionedEntities
{
    /** @param list<SanctionedEntitiesSanction> $sanctions */
    public function __construct(public array $sanctions, public int $count, public string $status,)
    {
    }

    public static function fromJson(string $json): self
    {
        /** @var SanctionedEntitiesType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param SanctionedEntitiesType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            sanctions: array_map(
                static fn (array $sanction): SanctionedEntitiesSanction => SanctionedEntitiesSanction::fromArray($sanction),
                $data['sanctions'],
            ),
            count: $data['count'],
            status: $data['status'],
        );
    }
}
