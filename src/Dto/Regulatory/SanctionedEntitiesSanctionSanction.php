<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Regulatory;

/**
 * @phpstan-import-type SanctionedEntitiesSanctionSanctionListType from SanctionedEntitiesSanctionSanctionList
 * @phpstan-type SanctionedEntitiesSanctionSanctionType array{
 *     source: string,
 *     program: string,
 *     notes: string,
 *     lists: list<SanctionedEntitiesSanctionSanctionListType>,
 * }
 */
readonly class SanctionedEntitiesSanctionSanction
{
    /** @param list<SanctionedEntitiesSanctionSanctionList> $lists */
    public function __construct(public string $source, public string $program, public string $notes, public array $lists,)
    {
    }

    /** @param SanctionedEntitiesSanctionSanctionType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            source: $data['source'],
            program: $data['program'],
            notes: $data['notes'],
            lists: array_map(
                static fn (array $list): SanctionedEntitiesSanctionSanctionList => SanctionedEntitiesSanctionSanctionList::fromArray($list),
                $data['lists'],
            ),
        );
    }
}
