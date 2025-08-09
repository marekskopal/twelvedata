<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Analysis;

/**
 * @phpstan-import-type MetaType from Meta
 * @phpstan-import-type EpsRevisionsEpsRevisionType from EpsRevisionsEpsRevision
 * @phpstan-type EpsRevisionsType array{
 *     meta: MetaType,
 *     eps_revision: list<EpsRevisionsEpsRevisionType>,
 *     status: string,
 * }
 */
readonly class EpsRevisions
{
    /** @param list<EpsRevisionsEpsRevision> $revenueEstimate */
    public function __construct(public Meta $meta, public array $revenueEstimate, public string $status)
    {
    }

    public static function fromJson(string $json): self
    {
        /** @var EpsRevisionsType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param EpsRevisionsType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            meta: Meta::fromArray($data['meta']),
            revenueEstimate: array_map(
                fn (array $item) => EpsRevisionsEpsRevision::fromArray($item),
                $data['eps_revision'],
            ),
            status: $data['status'],
        );
    }
}
