<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-import-type MetaType from Meta
 * @phpstan-import-type KeyExecutivesKeyExecutiveType from KeyExecutivesKeyExecutive
 * @phpstan-type KeyExecutivesType array{
 *     meta: MetaType,
 *     key_executives: list<KeyExecutivesKeyExecutiveType>,
 * }
 */
readonly class KeyExecutives
{
    /** @param list<KeyExecutivesKeyExecutive> $keyExecutives */
    public function __construct(public Meta $meta, public array $keyExecutives)
    {
    }

    public static function fromJson(string $json): self
    {
        /** @var KeyExecutivesType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param KeyExecutivesType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            meta: Meta::fromArray($data['meta']),
            keyExecutives: array_map(
                fn (array $item): KeyExecutivesKeyExecutive => KeyExecutivesKeyExecutive::fromArray($item),
                $data['key_executives'],
            ),
        );
    }
}
