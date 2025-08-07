<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Dto\Fundamentals;

/**
 * @phpstan-import-type LogoMetaType from LogoMeta
 * @phpstan-type LogoType array{
 *     meta: LogoMetaType,
 *     url?: string,
 *     logo_base?: string,
 *     logo_quote?: string,
 *  }
 */
readonly class Logo
{
    public function __construct(public LogoMeta $meta, public ?string $url, public ?string $logoBase, public ?string $logoQuote,)
    {
    }

    public static function fromJson(string $json): self
    {
        /** @var LogoType $responseContents */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /** @param LogoType $data */
    public static function fromArray(array $data): self
    {
        return new self(
            meta: LogoMeta::fromArray($data['meta']),
            url: $data['url'] ?? null,
            logoBase: $data['logo_base'] ?? null,
            logoQuote: $data['logo_quote'] ?? null,
        );
    }
}
